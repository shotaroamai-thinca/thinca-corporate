# thinca-corporate

シンカ社コーポレートサイト（https://www.thinca.co.jp/）の WordPress を Docker で管理するリポジトリ。

## 構成

- WordPress（localhost:8080）
- MySQL 8.0
- phpMyAdmin（localhost:8081）

## ディレクトリ構造

本番と同じ「Giving WordPress its own directory」構造を再現：

```
thinca-corporate/
├── docker-compose.yml
├── uploads.ini
├── README.md
├── .gitignore
└── public/                 ← Dockerマウント先（=本番のドキュメントルートに相当）
    ├── .htaccess           ← ローカル用に社内IP制限はコメントアウト済
    ├── index.php           ← 「Giving WP own directory」用
    ├── assets/             ← サイトルート直下のカスタムassets
    └── wp/                 ← WordPress本体（本番と同じ場所）
        ├── wp-admin/
        ├── wp-content/     ← themes/plugins/uploads
        ├── wp-includes/
        ├── wp-login.php
        └── ... (他PHPファイル)
```

## 起動方法

```bash
# 初回起動 / 再起動
docker compose up -d

# ログ確認
docker compose logs -f

# 停止
docker compose down

# DBごと完全削除（注意：データ全消し）
docker compose down -v
```

## アクセス

| URL | 用途 |
|---|---|
| http://localhost:8080 | WordPress フロント |
| http://localhost:8080/wp/wp-login.php | 管理画面ログイン |
| http://localhost:8081 | phpMyAdmin（DB可視化） |

## DB情報（ローカル専用）

- DB名: `thinca_wp`
- ユーザー: `wpuser` / パスワード: `wppass`
- ルート: `root` / パスワード: `rootpass`
- テーブル接頭辞: `wpa3c285`（本番に合わせる）

> ⚠️ローカル専用。本番DB情報とは別。docker-compose.yml で固定。

---

## 🌱 環境構築ガイド（非エンジニア向け・初めての人用）

> このガイドの通りに進めれば、**自分のMacの中で本番コーポサイトのコピーが動く** ようになります。所要時間：合計1〜1.5時間。

### このガイドが完了したらできること

- 自分のMacの中で本番コーポサイト（www.thinca.co.jp）と同じ画面が表示される
- 本番に影響を与えずに、テーマやプラグインの変更を試せる
- ブラウザで `http://localhost:8080` を開くと本番そっくりのサイトが見える

### 用語ミニ辞典

| 用語 | 意味 |
|---|---|
| **Docker** | アプリを「箱」に入れて動かす仕組み。WordPressもMySQLもこの箱で動く |
| **コンテナ** | Dockerの箱の中身。今回は3つ（WP・MySQL・phpMyAdmin） |
| **rsync** | ファイルをコピーするコマンド。サーバ↔自分のMacの間で使う |
| **wp-cli** | WordPressをコマンドで操作するツール |
| **phpMyAdmin** | データベースを画面で操作するツール |

### 事前準備

#### 1. Docker Desktop インストール
- https://www.docker.com/products/docker-desktop/ にアクセス
- 自分のMacに合った版（Apple Silicon or Intel）をダウンロード→インストール
- 起動して、メニューバーにクジラ🐳マークが出ればOK

#### 2. GitHub SSH設定
- GitHubアカウント作成（既にあればスキップ）
- SSHキーの設定（やり方はAI推進室に相談）

#### 3. 本番アクセス情報を取得（AI推進室から）
- SSHポート番号（例：22）
- SSHパスワード
- 本番phpMyAdminのURL・ログイン情報

#### 4. ターミナルを開く
- アプリ → ユーティリティ → ターミナル

---

### Step 1: リポジトリを clone（30秒）

ターミナルで以下を1行ずつ実行：

```bash
mkdir -p ~/Documents/projects
cd ~/Documents/projects
git clone git@github.com:shotaroamai-thinca/thinca-corporate.git
cd thinca-corporate
```

→ コード一式（テーマ・プラグイン・WP本体含む）が `~/Documents/projects/thinca-corporate/` に降りてくる

### Step 2: Docker環境を起動（5分・初回）

```bash
docker compose up -d
```

→ WordPress・MySQL・phpMyAdminの3コンテナが立ち上がる（初回はimage pullで5分くらい）

確認：
```bash
docker ps | grep thinca
```

→ 3コンテナ（thinca_wp、thinca_db、thinca_pma）がUpなら成功

### Step 3: 本番から画像（uploads/）を取得（30分・容量大）

WordPress の画像群（数百MB）を本番からコピー：

```bash
rsync -avz --progress -e "ssh -p {SSHポート}" kaicloud@www2182.sakura.ne.jp:/home/kaicloud/www/www-thinca-co-jp/wp/wp-content/uploads/ ./public/wp/wp-content/uploads/
```

> `{SSHポート}` は AI推進室から教えてもらった数字に置き換える

→ 600MB目安・10〜30分かかる。SSHパスワード入力を求められる

### Step 4: 本番DBダンプを取得＆ローカルに取り込み（15分）

#### 4-1. 本番phpMyAdminでエクスポート

1. 本番phpMyAdminにログイン（URL・情報はAI推進室から）
2. 左サイドバーで **コーポサイト用DB** を選択（プレフィックス `wpa3c285` で始まるテーブルが含まれるDB）
3. 上部「**エクスポート**」タブ
4. 「**カスタム**」を選択
5. 設定：
   - 圧縮：**gzip 形式**
   - フォーマット：SQL
   - 「**Add DROP TABLE / VIEW / PROCEDURE / FUNCTION / EVENT / TRIGGER statement**」にチェック
   - 「**Add IF NOT EXISTS**」にチェック
6. 一番下「**実行**」→ `.sql.gz` ファイルがダウンロードされる（200MB目安）

#### 4-2. ローカルに取り込み

ダウンロードファイル名を確認：
```bash
ls -lh ~/Downloads/*.sql.gz
```

→ ファイル名が出るので、それを下のコマンドに入れる：

```bash
gunzip -c ~/Downloads/{ダンプファイル名}.sql.gz | sed '/^CREATE DATABASE/d; /^USE /d' | docker exec -i thinca_db mysql -uroot -prootpass thinca_wp
```

> 警告（`Using a password on the command line interface can be insecure`）が出るが無視してOK

→ 1〜3分かかる。プロンプト（`%` の行）が戻ったら完了

### Step 5: URL置換（本番URL → localhost）（2分）

DB内に本番URL（https://www.thinca.co.jp）が残ってるので、localhost に書き換える。

#### 5-1. wp-cli をインストール

```bash
docker exec thinca_wp bash -c "curl -sO https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp"
```

#### 5-2. URL置換実行

```bash
docker exec thinca_wp wp search-replace 'https://www.thinca.co.jp' 'http://localhost:8080' --allow-root --skip-columns=guid
```

→ 「Success: Made X replacements」が出れば成功

### Step 6: Really Simple SSL を無効化（1分）

本番ではHTTPS強制してるが、ローカル（http）だとリダイレクトループになるので無効化：

```bash
docker exec thinca_wp wp plugin deactivate really-simple-ssl --allow-root
```

### Step 7: 動作確認（5分）

```bash
open http://localhost:8080
```

🎉 **本番と同じコーポサイトが localhost で見えたら完了！**

#### もしSSLエラー（ERR_SSL_PROTOCOL_ERROR）が出たら

**ブラウザのHSTS（HTTPS強制キャッシュ）** が原因の可能性。対処：

**Chromeの場合：**
1. アドレスバーに `chrome://net-internals/#hsts`
2. 一番下「**Delete domain security policies**」
3. 「Domain」に `localhost` 入力 → **Delete**
4. Chrome完全終了（Cmd+Q）→再起動

**手っ取り早い回避策：**
```bash
open -a "Safari" http://localhost:8080
```
→ Safariは HSTSキャッシュなしの状態で開ける

---

## ⚠️ データベース情報の扱い（重要）

| 項目 | 扱い |
|---|---|
| **wp-config.php** | Docker起動時に自動生成。本番DB情報を含まないローカル専用設定 |
| **ローカルDB接続情報** | `docker-compose.yml` に固定（wpuser/wppass等） |
| **本番DB接続情報** | 本番にSSH接続して確認のみ。**Gitリポジトリには絶対含めない** |
| **DBダンプファイル（.sql.gz）** | gitignore対象。各メンバーが本番から取得→ローカルに取り込み |
| **本番DBデータ** | 各メンバーのローカルにのみ存在。本番には書き戻さない |

### GitHub に含まれるもの／含まれないもの

| ✅ cloneで降りてくる | ❌ 個別取得（各メンバー） |
|---|---|
| docker-compose.yml | wp-config.php（Docker自動生成） |
| public/wp/wp-admin/, wp-includes/ | public/wp/wp-content/uploads/（rsync） |
| public/wp/wp-content/themes/, plugins/ | DBダンプ（本番phpMyAdmin） |
| public/assets/ | 本番DB接続情報 |
| .htaccess（社内IP制限はコメントアウト済） | - |
| この手順書（README） | - |

---

## 🛠️ トラブルシューティング

| 症状 | 対処 |
|---|---|
| Docker起動エラー | Docker Desktop が起動してるか確認 |
| 「ERR_SSL_PROTOCOL_ERROR」 | Step 7のHSTS削除 or Safari で開く |
| CSS/画像が読み込まれない | URL置換（Step 5）を再実行・キャッシュクリア |
| データベース接続エラー | `docker-compose.yml` の `WORDPRESS_TABLE_PREFIX = wpa3c285` を確認 |
| 「403 Forbidden」 | `public/.htaccess` の冒頭4行（Satisfy Any等）がコメントアウトされてるか確認 |
| 画像が一部表示されない | Step 3 の uploads/ 取得を再実行 |
| ファイルアップロード「2MB超過」 | uploads.ini が反映されてない。`docker compose down && docker compose up -d` でコンテナ再作成 |
| `/wp/wp-login.php` が 404 | `public/wp/wp-login.php` が存在するか確認。なければ Step 3 を再確認 |

---

## 📝 よく使うコマンド集

| やりたいこと | コマンド |
|---|---|
| Docker起動 | `cd ~/Documents/projects/thinca-corporate && docker compose up -d` |
| Docker停止 | `cd ~/Documents/projects/thinca-corporate && docker compose down` |
| ログ確認 | `docker compose logs -f` |
| WordPressコンテナに入る | `docker exec -it thinca_wp bash` |
| MySQLコンテナに入る | `docker exec -it thinca_db mysql -uroot -prootpass thinca_wp` |
| キャッシュクリア | `docker exec thinca_wp wp cache flush --allow-root` |
| 管理画面ログイン | http://localhost:8080/wp/wp-login.php |

---

## 🔐 Git管理ルール

| 種類 | Git管理 | 理由 |
|---|---|---|
| docker-compose.yml / README / .gitignore | ✅ | 共通設定 |
| public/wp/wp-admin/, wp-includes/, *.php | ✅ | WP本体 |
| public/wp/wp-content/themes/, plugins/ | ✅ | カスタム部分・本番設定 |
| public/assets/ | ✅ | 軽量・必要 |
| public/.htaccess | ✅（ローカル用編集済） | ⚠️本番デプロイ時は社内IP制限を有効化する |
| **public/wp/wp-content/uploads/** | ❌ | 容量大（数百MB） |
| **DB / wp-config.php / .sql.gz** | ❌ | 機密情報・容量大 |
| ai1wm-backups/, updraft/ | ❌ | 不要バックアップ |

⚠️ **本番デプロイ時の注意**：
- `public/.htaccess` の社内IP制限部分はローカル用にコメントアウト済。本番反映する場合は再有効化必要
- `wp-config.php` はローカル自動生成なので、本番にはデプロイしない
- DB は別管理。本番のDBを直接触らない

---

## 📚 関連ドキュメント

- 親プロジェクト: マーケティング部 コーポレートサイト内製化
- キックオフ資料: [marketing-corporate-site-kickoff-v1.md](https://app.notion.com/p/3685d3440f088125a8caeae430e74c70)

---

## 📅 進捗ログ

### 2026-06-11 クリーンビルドで完全再構築 ✅
- 旧構造（wp-content直マウント・シンボリックリンク方式）から本番完全準拠の構造へ移行
- 新ディレクトリ構造: `public/` 配下にWPコア・assets・サイトルートファイル全部入り
- 本番から rsync で WPコア（wp-admin/wp-includes/*.php）を取得
- `wp-config.php` は Docker imageの自動生成に任せる（永続化問題を解決）
- table_prefix は環境変数 `WORDPRESS_TABLE_PREFIX=wpa3c285` で永続管理
- `.htaccess` の社内IP制限はローカル用にコメントアウト（本番に戻す時は注意⚠️）
- フロント・管理画面（`/wp/wp-login.php`）両方の正常動作確認

### 2026-06-10 Phase 0+ 本番完全同期完了（旧構造ベース）
- 本番サーバ情報判明: さくらインターネット / 本番WPパス `/home/kaicloud/www/www-thinca-co-jp`
- 画像取得（636MB・3372ファイル）
- 本番DB完全同期、URL置換、`/wp/` 構造対応（シンボリックリンク方式）
- ※詳細は git history 参照

### 2026-06-08 Phase 0 完了（初期構築）
- Docker環境構築、Git管理開始、All-in-One WP Migration経由で初期データ取り込み
- ※詳細は git history 参照

---

## 🟡 次回検討

- [ ] GitHub Actions による自動デプロイ実装（mainブランチ→本番反映）
- [ ] Phase 1: Next.js + WPGraphQL ヘッドレス化の設計
- [ ] 本番DB の定期同期フロー（更新差分の取り込み）
- [ ] `.htaccess` の環境別管理（ローカル vs 本番）
- [ ] テスト環境（test-thinca-co-jp）の活用方針
</content>
</invoke>