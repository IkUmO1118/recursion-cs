<?php

namespace Commands\Programs;

use Commands\AbstractCommand;
use Commands\Argument;

class BookSearch extends AbstractCommand
{
  // TODO: エイリアスを設定してください。
  protected static ?string $alias = 'book-search';
  // TODO: 引数を設定してください。
  public static function getArguments(): array
  {
    return [];
  }
  // TODO: 実行コードを記述してください。
  public function execute(): int
  {
    return 0;
  }
}
