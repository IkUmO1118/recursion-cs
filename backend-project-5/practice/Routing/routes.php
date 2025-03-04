<?php

namespace Routing;

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
  'random/part' => function (): HTTPRenderer {
    $part = DatabaseHelper::getRandomComputerPart();

    return new HTMLRenderer('component/random-part', ['part' => $part]);
  },

  'parts' => function (): HTTPRenderer {
    $id = ValidationHelper::integer($_GET['id'] ?? null);

    $part = DatabaseHelper::getComputerPartById($id);
    return new HTMLRenderer('component/parts', ["part" => $part]);
  },

  'api/random/part' => function (): HTTPRenderer {
    $part = DatabaseHelper::getRandomComputerPart();
    return new JSONRenderer(['part' => $part]);
  },

  'api/parts' => function (): HTTPRenderer {
    $id = ValidationHelper::integer($_GET['id'] ?? null);
    $part = DatabaseHelper::getComputerPartById($id);
    return new JSONRenderer(['part' => $part]);
  },

  "types" => function (): HTTPRenderer {
    $type = ValidationHelper::string($_GET['type']  ?? null);
    $page = ValidationHelper::integer($_GET['page'] ?? 1);
    $perpage = ValidationHelper::integer($_GET['perpage'] ?? 10);

    $partsList = DatabaseHelper::getComputerPartByType($type, $page, $perpage);
    return new JSONRenderer(['parts' => $partsList]);
  },

  "random/computer" => function (): HTTPRenderer {
    $computer = DatabaseHelper::getRandomComputer();
    return new JSONRenderer(["computer" => $computer]);
  },

  "parts/newest" => function (): HTTPRenderer {
    $page = ValidationHelper::integer($_GET['page'] ?? 1);
    $perpage = ValidationHelper::integer($_GET['perpage'] ?? 10);

    $parts = DatabaseHelper::getNewestComputerParts($page, $perpage);
    return new JSONRenderer(["part" => $parts]);
  },

  "parts/performance" => function (): HTTPRenderer {
    $order = ValidationHelper::string($_GET['order'] ?? "asc");
    $type = ValidationHelper::string($_GET['type']  ?? null);

    $parts = DatabaseHelper::getComputerPartByPerformance($type, $order);
    return new JSONRenderer(["part" => $parts]);
  }
];
