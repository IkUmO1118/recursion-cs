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

  editor.getModel().onDidChangeContent((e) => {
    const content = editor.getValue();
    console.log(!content);

    if (content) {
      convert(content, getCurrentView());
    }
  });

  // init event listner
  const downloadForm = document.getElementById('md-form');
  downloadForm.addEventListener('submit', (_) => {
    convert(editor.getValue(), 'download');
  });

  document.querySelectorAll('input[name="view"]').forEach((el) => {
    el.addEventListener('change', (e) => {
      const content = editor.getValue();
      if (content) convert(content, e.target.value);
    });
  });
});

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
    } else {
      const htmlContent = await res.text();
      return htmlContent;
    }
  } catch (error) {
    console.error('Error:', error);
  }
}

async function convert(content, format) {
  if (format === 'download') {
    await post(content, format);
  } else {
    const convertedContent = await post(content, format);
    const previewContentEl = document.getElementById('content');

    if (format === 'preview') {
      previewContentEl.innerHTML = convertedContent;
    } else {
      previewContentEl.innerText = convertedContent;
    }
  }
}

function getCurrentView() {
  return document.querySelector('input[name="view"]:checked').value;
}
