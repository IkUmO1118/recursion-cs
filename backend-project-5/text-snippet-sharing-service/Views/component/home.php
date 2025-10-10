<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Text Snippet Sharing Services</title>
  <style>
    *,
    *::after,
    *::before {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #fafafa;
      padding: 5rem;
      height: 100vh;
      margin: 0;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.25);
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 2rem;
      z-index: 1000;
    }

    .modal_content {
      align-items: center;
      justify-content: center;
      background-color: #f5f5f5;
      box-shadow: 0px 0px 10px 0px #a3a3a3;
      color: #262626;
      padding: 2rem;
      border-radius: 1rem;
      display: flex;
      flex-direction: column;
    }

    .modal-content h2 {
      margin-bottom: 1rem;
      font-size: 1rem;
      color: #262626;
    }

    .modal-text {
      font-size: 0.9rem;
      color: #555;
      margin-bottom: 1.2rem;
    }

    .modal-url-box {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      margin-bottom: 0.8rem;
    }

    .modal-url-box input {
      flex: 1;
      padding: 0.5rem;
      border: 1px solid #d4d4d4;
      border-radius: 0.6rem;
      font-size: 0.8rem;
      color: #262626;
      text-align: center;
    }

    .modal-url-box button {
      background-color: #262626;
      color: #fff;
      border: none;
      padding: 0.5rem 0.8rem;
      border-radius: 0.6rem;
      font-size: 0.8rem;
      cursor: pointer;
    }

    .modal-url-box button:hover {
      background-color: #404040;
    }

    .modal-note {
      font-size: 0.75rem;
      color: #777;
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

    .icons {
      display: flex;
      align-items: center;
      justify-content: between;
      gap: 0.5rem;
      margin-right: 0.6rem;
    }

    .icon:hover {
      background-color: #e5e5e5;
    }

    .btn-outline {
      font-size: 0.8rem;
      font-weight: 600;
      padding: 0.4rem 0.8rem;
      background-color: inherit;
      border: none;
      outline: 0.8px solid #d4d4d4;
      color: #404040;
      border-radius: 10rem;
      cursor: pointer;
    }

    .btn-outline:hover {
      background-color: #e5e5e5;
    }

    .btn-primary {
      font-size: 0.8rem;
      font-weight: 600;
      padding: 0.4rem 0.8rem;
      background-color: #262626;
      border: none;
      color: #f5f5f5;
      border-radius: 0.4rem;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #404040;
    }

    .main {
      display: flex;
      flex: 1;
      overflow: hidden;
      gap: 0.5rem;
    }

    .editor {
      height: 100%;
      width: 100%;
    }

    .select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background-color: #f5f5f5;
      border: 1px solid #d4d4d4;
      border-radius: 0.8rem;
      padding: 0.4rem 2rem 0.4rem 0.8rem;
      font-size: 0.8rem;
      font-weight: 600;
      color: #262626;
      cursor: pointer;
      position: relative;
      transition: all 0.2s ease;
    }

    .select:hover {
      background-color: #ebebeb;
      border-color: #a3a3a3;
    }

    .select:focus {
      outline: none;
      border-color: #262626;
      box-shadow: 0 0 0 2px rgba(38, 38, 38, 0.2);
    }

    .select {
      background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='12' width='12' xmlns='http://www.w3.org/2000/svg'><path d='M2 4l4 4 4-4z'/></svg>");
      background-repeat: no-repeat;
      background-position: right 0.6rem center;
      background-size: 0.8rem;
    }

    .select option {
      background-color: #ffffff;
      color: #262626;
      font-size: 0.8rem;
      padding: 0.4rem 0.8rem;
      font-weight: 500;
    }

    .select option:hover {
      background-color: #262626;
      color: #ffffff;
    }
  </style>
</head>

<body>
  <div class="modal" id="snippet-modal">
    <div class="modal_content">
      <h3>スニペットを保存しました 🎉</h3>
      <p class="modal-text">
        以下のURLをコピーして、他の人とスニペットを共有できます。
      </p>
      <div class="modal-url-box">
        <input
          type="text"
          id="snippet-url"
          readonly
          value="https://example.com/snippet/12345" />
        <button id="copy-url-btn">コピー</button>
      </div>
      <p class="modal-note">URLをコピーすると、このウィンドウは閉じます。</p>
    </div>
  </div>
  <div class="container">
    <header class="header">
      <p class="date" id="date"></p>
      <div class="icons">
        <button class="btn-outline" id="clear-btn">Clear</button>
        <select class="select" id="format">
          <option value="javascript">JavaScript</option>
        </select>
        <select class="select" id="duration">
          <option value="10m" selected>10 Minutes</option>
          <option value="1h">1 Hour</option>
          <option value="1d">1 Day</option>
          <option value="never">Never</option>
        </select>
        <button class="btn-primary" id="post-btn">Create New Paste</button>
      </div>
    </header>
    <main>
      <div class="editor" id="editor"></div>
    </main>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
  <script>
    const previewContentEl = document.getElementById('content');
    const clearBtn = document.getElementById('clear-btn');
    const languageSelect = document.getElementById('format');
    const durationSelect = document.getElementById('duration');
    const postBtn = document.getElementById('post-btn');
    const modal = document.getElementById('snippet-modal');
    const urlInput = document.getElementById('snippet-url');
    const copyBtn = document.getElementById('copy-url-btn');

    const baseUrl = 'http://localhost:8000/';

    require.config({
      paths: {
        vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs',
      },
    });

    require(['vs/editor/editor.main'], function() {
      const editor = monaco.editor.create(document.getElementById('editor'), {
        value: '',
        language: 'javascript',
        automaticLayout: true,
      });

      displayOptions();

      // 言語変更イベント追加
      languageSelect.addEventListener('change', () => {
        const selectedLang = languageSelect.value;
        monaco.editor.setModelLanguage(editor.getModel(), selectedLang);
      });

      // Clear ボタン
      clearBtn.addEventListener('click', () => {
        editor.setValue('');
      });

      // Post ボタン
      postBtn.addEventListener('click', async () => {
        const snippet = editor.getValue();
        const lang = languageSelect.value;
        const duration = durationSelect.value;

        try {
          const url = await post(snippet, lang, duration);
          openModal(url);
          editor.setValue('');
        } catch (error) {
          alert('Failed to post snippet. Please try again.');
        }
      });
    });

    async function post(snippet, lang, duration) {
      try {
        const res = await fetch(`${baseUrl}api/snippet`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            snippet,
            lang,
            duration
          }),
        });

        const data = await res.json();

        if (!res.ok) {
          throw new Error(`HTTP error! status: ${res.status}`);
        }

        return data.url;
      } catch (error) {
        console.error('Error:', error);
        throw error;
      }
    }

    // モーダルを開く関数
    function openModal(url) {
      urlInput.value = url;
      modal.style.display = 'flex';
    }

    // コピーしてモーダルを閉じる
    copyBtn.addEventListener('click', () => {
      navigator.clipboard.writeText(urlInput.value).then(() => {
        alert('URLをコピーしました！');
        modal.style.display = 'none';
      });
    });

    // 背景クリックで閉じる
    modal.addEventListener('click', (e) => {
      if (e.target.id === 'snippet-modal') {
        e.currentTarget.style.display = 'none';
      }
    });

    function displayOptions() {
      const allLangs = monaco.languages.getLanguages();
      allLangs.sort((a, b) => {
        const nameA = a.aliases ? a.aliases[0] : a.id;
        const nameB = b.aliases ? b.aliases[0] : b.id;
        return nameA.localeCompare(nameB);
      });

      for (let lang of allLangs) {
        const optionLang = document.createElement('option');
        optionLang.value = lang.id;
        optionLang.textContent = lang.aliases ? lang.aliases[0] : lang.id;
        languageSelect.appendChild(optionLang);
      }
    }

    // get now date
    function updateDate() {
      const now = new Date();
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0');
      const day = String(now.getDate()).padStart(2, '0');

      const formattedDate = `${year}-${month}-${day}`;
      document.getElementById('date').textContent = formattedDate;
    }

    updateDate();
  </script>
</body>

</html>