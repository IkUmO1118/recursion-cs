<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JOSNRenderer;

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
    return new JOSNRenderer(['part' => $part]);
  },

  'api/parts' => function (): HTTPRenderer {
    $id = ValidationHelper::integer($_GET['id'] ?? null);
    $part = DatabaseHelper::getComputerPartById($id);
    return new JOSNRenderer(['part' => $part]);
  }
];
