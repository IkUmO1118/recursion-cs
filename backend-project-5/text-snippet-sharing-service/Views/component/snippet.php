<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Snippet Viewer</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #fafafa;
      padding: 5rem;
      height: 100vh;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }

    .container {
      height: 100%;
      padding: 1rem;
      border-radius: 2rem;
      background-color: #ffffff;
      box-shadow: 0px 0px 5px 0px #a3a3a3;
      display: grid;
      grid-template-rows: 3rem 1fr;
      gap: 0.8rem;
      overflow: hidden;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .date {
      border-radius: 2rem;
      padding: 0.6rem 1.2rem;
      background-color: #f5f5f5;
      color: #262626;
      font-size: 0.8rem;
      font-weight: 600;
    }

    .lang-badge {
      padding: 0.4rem 1rem;
      border-radius: 1rem;
      background-color: #262626;
      color: #fff;
      font-size: 0.8rem;
      font-weight: 600;
      border: none;
      cursor: default;
    }

    .editor {
      height: 100%;
      width: 100%;
      border-radius: 0.8rem;
      overflow: hidden;
    }

    .not-found {
      text-align: center;
      font-size: 1rem;
      color: #555;
      margin-top: 2rem;
    }
  </style>
</head>

<body>
  <?php if (!empty($snippet)): ?>
    <?php
    // snippetデータのデコード（DB内では &quot; などが含まれているため）
    $code = htmlspecialchars_decode($snippet['snippet'] ?? '');
    $lang = htmlspecialchars($snippet['language'] ?? 'plaintext', ENT_QUOTES, 'UTF-8');
    $createdAt = htmlspecialchars($snippet['created_at'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
    ?>

    <div class="container">
      <header class="header">
        <p class="date"><?= $createdAt ?></p>
        <button class="lang-badge"><?= $lang ?></button>
      </header>
      <main>
        <div id="editor" class="editor"></div>
      </main>
    </div>

    <!-- Monaco Editor 読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
    <script>
      const snippetCode = <?= json_encode($code, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
      const snippetLang = <?= json_encode($lang) ?>;

      require.config({
        paths: {
          vs: "https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs"
        }
      });

      require(["vs/editor/editor.main"], function() {
        monaco.editor.create(document.getElementById("editor"), {
          value: snippetCode,
          language: snippetLang,
          theme: "vs-dark",
          readOnly: true,
          automaticLayout: true,
          minimap: {
            enabled: false
          },
          fontSize: 14,
          lineNumbers: "on",
        });
      });
    </script>
  <?php else: ?>
    <p class="not-found">Snippet not found.</p>
  <?php endif; ?>
</body>

</html>