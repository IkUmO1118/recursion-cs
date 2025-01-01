const previewContentEl = document.getElementById('content');
const SVGOption = document.getElementById('svg');
const PNGOption = document.getElementById('png');
const ASCIIOption = document.getElementById('ascii');
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
  SVGOption.addEventListener('click', async () =>
    toggleActive('svg', editor.getValue())
  );
  PNGOption.addEventListener('click', async () =>
    toggleActive('png', editor.getValue())
  );
  ASCIIOption.addEventListener('click', async () =>
    toggleActive('ascii', editor.getValue())
  );

  // clear editor
  clearBtn.addEventListener('click', () => {
    editor.setValue('');
  });
});

async function toggleActive(targetId, text) {
  document.querySelectorAll('.option').forEach((option) => {
    option.classList.remove('active');
  });

  document.getElementById(targetId).classList.add('active');
  encode(text, targetId);
}

async function post(text, format) {
  try {
    const res = await fetch('./src/encode.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'text/plain',
      },
      body: JSON.stringify({ format: format, text: text }),
    });

    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }
    if (format === 'download') {
      console.log('download');
    } else {
      return await res.text();
    }
  } catch (error) {
    console.error('Error:', error);
    throw error;
  }
}

async function encode(text, format) {
  if (format === 'download') {
    await post(text, format);
  } else {
    const encoded = await post(text, format);

    if (format === 'png' || format === 'svg') {
      previewContentEl.innerHTML = `<img src="${encoded}" alt="encoded image">`;
    }
    if (format === 'ascii') {
      const ascii = await getAscii(encoded);

      previewContentEl.innerHTML = `<pre>${ascii}</pre>`;
    }
  }
}

async function getAscii(encoded) {
  const res = await fetch(encoded, {
    method: 'GET',
  });

  return await res.text();
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
