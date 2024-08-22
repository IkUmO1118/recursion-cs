import markdown
import sys

sys.stdout.buffer.write(b'Enter the command.\n')
sys.stdout.flush()
args = sys.stdin.buffer.readline().decode().strip().split()

# markdown sample.md index.html
command = args[0]
input_file = args[1]
output_file = args[2]

def markdown_to_html(input_file, output_file):
    # Markdownファイルを読み込み
    with open(input_file, 'r', encoding='utf-8') as f:
        markdown_text = f.read()

    # MarkdownをHTMLに変換
    html = markdown.markdown(markdown_text)

    # HTMLを出力ファイルに書き込み
    with open(output_file, 'w', encoding='utf-8') as f:
        f.write(html)

if command == 'markdown':
    markdown_to_html(input_file, output_file)