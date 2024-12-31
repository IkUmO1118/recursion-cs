const previewContentEl = document.getElementById('content');
const SVGOption = document.getElementById('option-svg');
const PNGOption = document.getElementById('option-png');
const ASCIIOption = document.getElementById('option-ascii');
const downloadBtn = document.getElementById('download-btn');
const shareBtn = document.getElementById('share-btn');
const clearBtn = document.getElementById('clear-btn');

require.config({
  paths: {
    vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs',
  },
});
require(['vs/editor/editor.main'], function () {
  const editor = monaco.editor.create(document.getElementById('editor'), {
    value: '',
    language: 'markdown',
    automaticLayout: true,
  });

  editor.getModel().onDidChangeContent(() => {
    const content = editor.getValue();

    if (content) {
      convert(content, getCurrentView());
    }
  });

  // init event listner
  downloadBtn.addEventListener('click', () =>
    convert(editor.getValue(), 'download')
  );

  // changed option type
  SVGOption.addEventListener('click', () =>
    toggleActive('option-svg', editor.getValue())
  );
  PNGOption.addEventListener('click', () =>
    toggleActive('option-png', editor.getValue())
  );
  ASCIIOption.addEventListener('click', () =>
    toggleActive('option-ascii', editor.getValue())
  );

  // clear editor
  clearBtn.addEventListener('click', () => {
    editor.setValue('');
  });
});

function toggleActive(targetId, content) {
  document.querySelectorAll('.option').forEach((option) => {
    option.classList.remove('active');
  });

  document.getElementById(targetId).classList.add('active');
  // convert(content, targetId);
}

async function post(content, format) {
  try {
    const res = await fetch('./src/encode.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ content, format }),
    });

    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }
    if (format === 'download') {
      const blob = await res.blob();
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'converted.html';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      window.URL.revokeObjectURL(url);
    } else {
      const htmlContent = await res.text();
      return htmlContent;
    }
  } catch (error) {
    console.error('Error:', error);
  }
}

async function convert(content, format) {
  if (format === 'download' || format === 'share') {
    await post(content, format);
  } else {
    const encodedContent = await post(content, format);
    previewContentEl.innerHTML = encodedContent;
  }
}

function getCurrentView() {
  return document.querySelector('.option.active').id;
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
