<?php

namespace Routing;

use Dom\HTMLElement;
use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
  '' => function (): HTTPRenderer {
    return new HTMLRenderer("component/home");
  },

  "api/snippet" => function (): HTTPRenderer {
    $input = json_decode(file_get_contents('php://input'), true);
    $snippet = ValidationHelper::getValidatedSnippetFromRequest($input["snippet"] ?? null);
    $language = $input["lang"] ?? "javascript";
    $duration = $input["duration"] ?? "10m";

    $url = DatabaseHelper::insertSnippet($snippet, $language, $duration);
    return new JSONRenderer(["url" => $url]);
  },

  'snippet/([a-zA-Z0-9]+)' => function (string $snippetId): HTTPRenderer {
    $snippetData = DatabaseHelper::getSnippetById($snippetId);
    error_log("[DEBUG] snippetData = " . print_r($snippetData, true));

    return new HTMLRenderer("component/snippet", ["snippet" => $snippetData]);
  },
];
