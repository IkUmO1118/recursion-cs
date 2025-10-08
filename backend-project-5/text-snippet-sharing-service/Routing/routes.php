<?php

namespace Routing;

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
  "api/snippet" => function (): HTTPRenderer {
    $input = json_decode(file_get_contents('php://input'), true);
    $snippet = ValidationHelper::getValidatedSnippetFromRequest($input["snippet"] ?? null);
    $language = $input["lang"] ?? "javascript";
    $duration = $input["duration"] ?? "10m";

    $url = DatabaseHelper::insertSnippet($snippet, $language, $duration);
    return new JSONRenderer(["url" => $url]);
  },
];
