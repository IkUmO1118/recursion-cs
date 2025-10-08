const previewContentEl = document.getElementById('content');
const clearBtn = document.getElementById('clear-btn');
const languageSelect = document.getElementById('format');

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
});

async function post(type, text, format) {
  try {
    const res = await fetch('./src/encode.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ type, format, text }),
    });

    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }
    if (type === 'download') {
      const blob = await res.blob();
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `userCode.${format}`;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      window.URL.revokeObjectURL(url);
    } else {
      return await res.text();
    }
  } catch (error) {
    console.error('Error:', error);
    throw error;
  }
}

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
