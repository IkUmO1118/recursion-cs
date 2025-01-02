const previewContentEl = document.getElementById('content');
const SVGOption = document.getElementById('svg');
const PNGOption = document.getElementById('png');
const ASCIIOption = document.getElementById('txt');
const downloadBtn = document.getElementById('download-btn');
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
    const text = editor.getValue();

    if (text) {
      encode(text, getCurrentView());
    }
  });

  // init event listner
  downloadBtn.addEventListener('click', async () =>
    encode(editor.getValue(), 'download')
  );

  // changed option type
  SVGOption.addEventListener('click', () =>
    toggleActive('svg', editor.getValue())
  );
  PNGOption.addEventListener('click', () =>
    toggleActive('png', editor.getValue())
  );
  ASCIIOption.addEventListener('click', () =>
    toggleActive('txt', editor.getValue())
  );

  // clear editor
  clearBtn.addEventListener('click', () => {
    editor.setValue('');

    previewContentEl.innerHTML = '';
  });
});

async function toggleActive(targetId, text) {
  document.querySelectorAll('.option').forEach((option) => {
    option.classList.remove('active');
  });

  document.getElementById(targetId).classList.add('active');
  encode(text, targetId);
}

async function encode(text, format) {
  if (format === 'download') {
    const downloadFormat = getDownloadFormat();
    await post('download', text, downloadFormat);
  } else {
    const encoded = await post('preview', text, format);

    if (format === 'png' || format === 'svg') {
      previewContentEl.innerHTML = `<img style="width: 50%;" src="${encoded}" alt="encoded image">`;
    }
    if (format === 'txt') {
      const ascii = await getAscii(encoded);
      previewContentEl.innerHTML = `<pre>${ascii}</pre>`;
    }
  }
}

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

async function getAscii(encoded) {
  const res = await fetch(encoded);

  return await res.text();
}

function getCurrentView() {
  return document.querySelector('.option.active').id;
}

function getDownloadFormat() {
  return document.getElementById('format').value;
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
