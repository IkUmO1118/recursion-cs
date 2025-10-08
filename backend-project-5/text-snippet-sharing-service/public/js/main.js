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
      body: JSON.stringify({ snippet, lang, duration }),
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
