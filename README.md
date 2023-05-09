# ポートフォリオ


# 概要
 
サウナ後のご飯を一緒に食べる人をマッチングさせるサービスです。

 - **どんな悩みを解決するのか**

サウナの後の飯は格別に美味いし、一人で食べるより誰かと一緒に食べる方がさらに美味い！

サウナ友達が欲しい、サウナの情報交換したいなどのサウナについて語り合いたい人たちを繋げるきっかけを作りたい。

サウナのペースは人それぞれだしドラクエ行為(集団行為)も他の利用者に迷惑がかかる。しかしサウナの後はサ飯を食べるのでそこで交流の場を作り、サウナをもっと楽しんでもらいたいと思いからアプリを制作しました。

 - **どのようにマッチングさせるか**
1. 誰かとサ飯を食べたい人が、食事と場所の時間を決めて募集板を立てる。
2. 募集を見て行きたい人がマッチングする。(DM機能もつける)
3. サウナはそれぞれ楽しみ、合流してサ飯を一緒に食べる！

# 苦労したところ
- DB設計 DBリレーション関連の処理に苦労しました。募集一覧を見てマッチング状況がすぐにわかるように、マッチング状況のステータスを表示させる機能や、マッチング済みの場合は応募出来ないようにする機能を実装できました。
- Dockerでアプリをコンテナ化することで、開発本番での環境間差異トラブルを低減しました。
- Docker-Composeでコンテナ化アプリケーションを効率的に管理しながら開発を進めました。
- AWS Route53, ACM, ALBを用いて、独自ドメイン＋常時SSL通信(HTTPS)を実現しました。

**作品での妥協点:**
Vue.jsを使用したSPA開発ページ遷移が多いマッチングアプリには、SPAが最適だと考えました。しかし、開発初期にSPAの仕組みを十分に理解できず、「後で改善すれば良い」と考えていました。しかし、調査を進めるうちに、MPAからSPAへの移行が難しいことを認識し、制作期間内でのやり直しは不可能と判断し、今回は断念しました。

この1ヶ月半のアプリ制作期間で得た知識は非常に貴重でした。限られた時間の中で学ぶべき内容が膨大であると、挫折や知識が中途半端になるデメリットも経験できました。次回新しい技術を学ぶ機会があれば、じっくり時間をかけて習得することを心掛け、エンジニアとしてのキャリアプランを構築していきたいと考えています。

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

4. **応募機能**
    - 募集検索
    - 募集への応募
 
5. **マッチング機能**
    - ユーザー同士のマッチング
    - マッチング状況のステータス表示

6. **メッセージ機能**
    - チャットルーム一覧表示
    - チャットルーム内のメッセージ表示・送信
    - チャットルーム削除
    - メッセージの送信時間表示

7. **画像アップロード機能**
    - ユーザーのアイコン登録
 
# 開発環境
- **バックエンド**
  - PHP 8.0.28
  - Laravel  8.83.27
  - mysql 8.0.32 
  - phpMyAdmin 5.2.1
- **フロントエンド**
  - HTML / CSS
  - tailwindcss 3.1.0
- **開発環境**
  - nginx 1.20.2
  - Docker 20.10.22
  - Docker Compose 2.15.1
  - Composer 2.5.0
  - PHPUnit
  - VScode
  - aws-cli/2.11.9
- **インフラ**
  - AWS(EC2,RDS,ALB,ACM,Route53,S3,CloudWatch)

# デザインカンプ
![デザインカンプ](https://user-images.githubusercontent.com/114846314/237008074-22c6c1f4-16c8-409a-89ac-8d7aea51326c.png)


# ER図
<img width="969" alt="ER図" src="https://user-images.githubusercontent.com/114846314/237008261-2dabef4c-534b-4cda-97cc-9488070f8787.png">

# テーブル定義
<img width="846" alt="テーブル定義" src="https://user-images.githubusercontent.com/114846314/237008429-a4780269-0aad-48ae-a78e-4d3b68cdbbe6.png">


 
# インフラ構成図
![aws構成図](https://user-images.githubusercontent.com/114846314/237008314-1b64cdca-428d-47ca-b71b-2cc4d15549ba.jpg)
