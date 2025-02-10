<?php

namespace Commands\Programs;

use Commands\AbstractCommand;
use Commands\Argument;
use Database\MySQLWrapper;

class BookSearch extends AbstractCommand
{
  protected static ?string $alias = 'book-search';

  public static function getArguments(): array
  {
    return [
      (new Argument('title'))
        ->description('Search for a book by title')
        ->required(false)
        ->allowAsShort(true),
      (new Argument('isbn'))
        ->description('Search for a book by ISBN')
        ->required(false)
        ->allowAsShort(true),
    ];
  }

  public function execute(): int
  {
    $title = $this->getArgumentValue('title');
    $isbn = $this->getArgumentValue('isbn');

    if (!$title && !$isbn) {
      echo "Please provide a title or ISBN to search for a book.\n";
      return 1;
    }

    $cacheKey = $this->generateCacheKey($title, $isbn);
    $cachedData = $this->getCachedData($cacheKey);

    if ($cachedData && !$this->isCacheExpired($cachedData['updated_at'])) {
      echo "Using cached data:\n";
      print_r($cachedData['data']);
      return 0;
    }

    $bookData = $this->fetchBookData($title, $isbn);

    if ($bookData) {
      $this->cacheData($cacheKey, $bookData);
      echo "Fetched data from Open Library:\n";
      print_r($bookData);
      return 0;
    }

    echo "No book found.\n";
    return 1;
  }

  private function generateCacheKey(?string $title, ?string $isbn): string
  {
    if ($isbn) {
      return "book-search-isbn-$isbn";
    }
    return "book-search-title-" . md5($title);
  }

  private function getCachedData(string $cacheKey): ?array
  {
    $db = new MySQLWrapper();
    $result = $db->query("SELECT * FROM cache WHERE `key` = '$cacheKey'");
    return $result->fetch_assoc();
  }

  private function isCacheExpired(string $updatedAt): bool
  {
    $updatedTime = strtotime($updatedAt);
    return (time() - $updatedTime) > (30 * 24 * 60 * 60); // 30 days
  }

  private function fetchBookData(?string $title, ?string $isbn): ?array
  {
    $query = $isbn ? "isbn:$isbn" : "title:$title";
    $url = "https://openlibrary.org/search.json?$query";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return $data['docs'][0] ?? null;
  }

  private function cacheData(string $cacheKey, array $data): void
  {
    $db = new MySQLWrapper();
    $jsonData = json_encode($data);
    $db->query("REPLACE INTO cache (`key`, `data`, `updated_at`) VALUES ('$cacheKey', '$jsonData', NOW())");
  }
}
