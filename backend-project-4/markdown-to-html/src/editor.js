const previewOption = document.getElementById('option-preview');
const htmlOption = document.getElementById('option-html');
const downloadBtn = document.getElementById('download-btn');
const shareBtn = document.getElementById('share-btn');

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

  shareBtn.addEventListener('click', () => convert(editor.getValue(), 'share'));

  // changed option type
  previewOption.addEventListener('click', () =>
    toggleActive('option-preview', editor.getValue())
  );
  htmlOption.addEventListener('click', () =>
    toggleActive('option-html', editor.getValue())
  );
});

function toggleActive(targetId, content) {
  document.querySelectorAll('.option').forEach((option) => {
    option.classList.remove('active');
  });

  document.getElementById(targetId).classList.add('active');
  convert(content, targetId);
}

async function post(content, format) {
  try {
    const res = await fetch('./src/converter.php', {
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
    } else if (format === 'share') {
      const shareData = {
        title: 'Markdown content',
        text: await res.text(),
      };

      await navigator.share(shareData);
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
    const convertedContent = await post(content, format);
    const previewContentEl = document.getElementById('content');

    if (format === 'option-preview') {
      previewContentEl.innerHTML = convertedContent;
    }
    if (format === 'option-html') {
      previewContentEl.innerText = convertedContent;
    }
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
