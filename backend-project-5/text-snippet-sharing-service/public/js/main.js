const previewContentEl = document.getElementById('content');
const clearBtn = document.getElementById('clear-btn');
const languageSelect = document.getElementById('format');
const postBtn = document.getElementById('post-btn');
const modal = document.getElementById('snippet-modal');
const urlInput = document.getElementById('snippet-url');
const copyBtn = document.getElementById('copy-url-btn');

require.config({
  paths: {
    vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs',
  },
});
require(['vs/editor/editor.main'], function () {
  const editor = monaco.editor.create(document.getElementById('editor'), {
    value: '',
    language: 'javascript',
    automaticLayout: true,
  });

  displayOptions();

  // --- 言語変更イベント追加 ---
  languageSelect.addEventListener('change', () => {
    const selectedLang = languageSelect.value;
    monaco.editor.setModelLanguage(editor.getModel(), selectedLang);
  });

  // --- Clear ボタン ---
  clearBtn.addEventListener('click', () => {
    editor.setValue('');
  });

  // --- Post ボタン ---
  postBtn.addEventListener('click', async () => {
    const snippet = editor.getValue();
    const lang = languageSelect.value;

    try {
      await post(snippet, lang);
      openModal('https://snippet.19mod.com/snippet/12345');
      editor.setValue('');
    } catch (error) {
      alert('Failed to post snippet. Please try again.');
      // 仮のURL
      openModal('https://snippet.19mod.com/snippet/12345');
    }
  });
});

async function post(snippet, lang) {
  try {
    const res = await fetch('http://127.0.0.1:8000/api/snippet', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ type, format, text }),
    });

    console.log(res);

    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }
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
    // 比較に alias[0] や id を使う
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

// -------------get now date----------------
function updateDate() {
  const now = new Date();
  const year = now.getFullYear();
  const month = String(now.getMonth() + 1).padStart(2, '0');
  const day = String(now.getDate()).padStart(2, '0');

  const formattedDate = `${year}-${month}-${day}`;
  document.getElementById('date').textContent = formattedDate;
}

updateDate();
