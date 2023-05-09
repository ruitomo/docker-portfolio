# ポートフォリオ


# 概要
 
サウナ後のご飯を一緒に食べる人をマッチングさせるサイト
 
# 機能一覧

1. **認証機能**
    - 新規登録機能
    - ログイン、ログアウト機能
    - メールアドレス変更機能
    - パスワードリセット機能
    - アカウント削除機能
    - 2段階認証機能
2. **ユーザープロフィール機能**
    - アイコン付きプロフィール表示
    - アイコン付きプロフィール編集・更新
3. **募集機能**
    - 募集一覧表示
    - 募集作成・確認
    - 募集編集・更新
    - 募集削除
    - 募集詳細表示
    - 作成した募集一覧表示
    - 募集送信時間表示
**4. 応募機能**
    - 募集検索
    - 募集への応募
5. マッチング機能
    - ユーザー同士のマッチング
    - マッチング状況のステータス表示
6. メッセージ機能
    - チャットルーム一覧表示
    - チャットルーム内のメッセージ表示・送信

    - チャットルーム削除
    - メッセージの送信時間表示
7. 画像アップロード機能
 
# 開発環境
- **バックエンド**
  - PHP 8.0.28
  - Laravel  8.83.27
  - mysql 8.0.32 
  - phpMyAdmin 5.2.1
- フロントエンド
  - HTML / CSS
  - tailwindcss 3.1.0
- 開発環境
  - nginx 1.20.2
  - Docker 20.10.22
  - Docker Compose 2.15.1
  - Composer 2.5.0
  - PHPUnit
  - VScode
  - aws-cli/2.11.9
- インフラ
  - AWS(EC2,RDS,ALB,ACM,Route53,S3,CloudWatch)

# デザインカンプ
![デザインカンプ](https://user-images.githubusercontent.com/114846314/237008074-22c6c1f4-16c8-409a-89ac-8d7aea51326c.png)


# ER図
<img width="969" alt="ER図" src="https://user-images.githubusercontent.com/114846314/237008261-2dabef4c-534b-4cda-97cc-9488070f8787.png">

# テーブル定義
<img width="846" alt="テーブル定義" src="https://user-images.githubusercontent.com/114846314/237008429-a4780269-0aad-48ae-a78e-4d3b68cdbbe6.png">


 
# インフラ構成図
![aws構成図](https://user-images.githubusercontent.com/114846314/237008314-1b64cdca-428d-47ca-b71b-2cc4d15549ba.jpg)
