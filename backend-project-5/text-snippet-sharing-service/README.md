# アプリ構成

## フロント側の機能

- テキストの言語設定用の option
- スニペットの有効期限設定用の option
- url 作成のボタン
- 閲覧用の url を開いたときの表示
  - 期限切れ時の「Expired snippet」

## api ベースの機能

- POST /api/snippet
- GET /api/snippet/{unique-string}

## データベース

id int NOT NULL AUTO_INCREMENT  
snippet VARCHAR(255) NOT NULL  
url VARCHAR(255) NOT NULL  
language VARCHAR(255) NOT NULL  
created_at datetime NOT NULL  
expired_at datetime NOT NULL  
PRIMARY KEY (id)

## コマンド

- マイグレーションファイルの作成
  `php console code-gen migration --name {マイグレーションファイル名}`

- マイグレーションの実行
  `php console migrate`
  `php console migrate --init`

- ロールバック
  `php console migrate --rollback 2`

- シーダ―
  `php console seed`
