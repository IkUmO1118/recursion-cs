<?php

namespace Routing;

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
  "api/snippet" => function (): HTTPRenderer {
    $snippet = ValidationHelper::getValidatedSnippetFromRequest($_GET["snippet"] ?? null);
    $lang = $_GET["lang"] ?? "javascript";

    $url = DatabaseHelper::insertSnippet($snippet, $lang);
    return new JSONRenderer(["url" => $url]);
  },

  "snippet/:id" => function (): HTTPRenderer {}
];
