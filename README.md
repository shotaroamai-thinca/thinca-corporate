# thinca-corporate-wp

シンカ社コーポレートサイト（https://www.thinca.co.jp/）の WordPress を Docker で管理するリポジトリ。

## 構成

- WordPress（localhost:8080）
- MySQL 8.0
- phpMyAdmin（localhost:8081）

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
| http://localhost:8080 | WordPress |
| http://localhost:8081 | phpMyAdmin（DB可視化） |

## DB情報（ローカル）

- DB名: `thinca_wp`
- ユーザー: `wpuser` / パスワード: `wppass`
- ルート: `root` / パスワード: `rootpass`

> ※ローカル専用、本番DB情報とは別。

---

## 🌱 環境構築ガイド（非エンジニア向け・初めての人用）

> このガイドの通りに進めれば、**自分のMacの中で本番コーポサイトのコピーが動く** ようになります。所要時間：1〜2時間。

### このガイドが完了したらできること

- 自分のMacの中で本番コーポサイト（www.thinca.co.jp）と同じ画面が表示される
- 本番に影響を与えずに、テーマやプラグインの変更を試せる
- ブラウザで `http://localhost:8080` を開くと本番そっくりのサイトが見える

### 用語ミニ辞典

| 用語 | 意味 |
|---|---|
| **Docker** | アプリを「箱」に入れて動かす仕組み。WordPressもMySQLもこの箱で動く |
| **コンテナ** | Dockerの箱の中身。今回は3つ（WP、MySQL、phpMyAdmin） |
| **rsync** | ファイルをコピーするコマンド。サーバ↔自分のMacの間で使う |
| **wp-cli** | WordPressをコマンドで操作するツール |
| **phpMyAdmin** | データベースを画面で操作するツール |

### 事前準備

#### 1. Docker Desktopをインストール
- https://www.docker.com/products/docker-desktop/ にアクセス
- 自分のMacに合った版（Apple Silicon or Intel）をダウンロード→インストール
- 起動して、メニューバーにクジラ🐳マークが出ればOK

#### 2. GitHubアカウント
- https://github.com/ で作成（既にあればスキップ）
- SSHキー設定（やり方は別途AI推進室に相談）

#### 3. ターミナルを開く
- アプリ → ユーティリティ → ターミナル

#### 4. 本番サーバの情報を取得
AI推進室から下記を共有してもらう：
- SSHポート番号（例：22 など）
- SSHパスワード（または鍵ファイル）

---

### Step 1: リポジトリを自分のMacにダウンロード

ターミナルで以下を1行ずつコピペ実行：

```bash
mkdir -p ~/Documents/projects
cd ~/Documents/projects
git clone git@github.com:shotaroamai-thinca/thinca-corporate.git thinca-corporate-wp
cd thinca-corporate-wp
```

→ ファイル一式が `~/Documents/projects/thinca-corporate-wp/` に降りてくる

### Step 2: Docker環境を起動

```bash
docker compose up -d
```

→ WordPress、MySQL、phpMyAdminの3つのコンテナが立ち上がる（初回は5分くらいかかる）

確認：
```bash
docker ps
```

→ 3つコンテナ（thinca_wp、thinca_db、thinca_pma）がRunningなら成功

### Step 3: 動作確認（仮）

ブラウザで開く：
- http://localhost:8080 → WordPressのセットアップ画面が出る（まだコンテンツなし）
- http://localhost:8081 → phpMyAdmin（ユーザー: `wpuser` / パスワード: `wppass`）

→ ここで動けば基盤OK

### Step 4: 本番から画像を取得

本番サーバ `/home/kaicloud/www/www-thinca-co-jp/wp-content/uploads/` から自分のMacに画像コピー。

```bash
cd ~/Documents/projects/thinca-corporate-wp && rsync -avz --progress -e "ssh -p {SSHポート}" kaicloud@www2182.sakura.ne.jp:/home/kaicloud/www/www-thinca-co-jp/wp-content/uploads/ ./wp-content/uploads/
```

> `{SSHポート}` は AI推進室から教えてもらった数字に置き換える

→ 600MB以上あるので10〜30分かかる

### Step 5: 本番から `/assets/` を取得

本番では画像の一部がサイトのルート直下にある（カスタム実装のため）。これも取得：

```bash
rsync -avz --progress -e "ssh -p {SSHポート}" kaicloud@www2182.sakura.ne.jp:/home/kaicloud/www/www-thinca-co-jp/assets/ ./assets/
```

### Step 6: 本番のデータベースをダウンロード＆取り込み

#### 6-1. 本番phpMyAdminからエクスポート

1. 本番phpMyAdminにアクセス（AI推進室から URL・ログイン情報受け取る）
2. 左サイドバーで **「コーポサイト用のDB」**（プレフィックス `wpa3c285` で始まるテーブルが含まれるDB）を選択
3. 上部「**エクスポート**」タブ
4. **「カスタム」** を選択
5. 設定：
   - 圧縮：**gzip 形式**
   - フォーマット：SQL
   - **「Add DROP TABLE / VIEW / PROCEDURE / FUNCTION / EVENT / TRIGGER statement」** にチェック
   - **「Add IF NOT EXISTS」** にチェック
6. 一番下「**実行**」→ `.sql.gz` がダウンロードされる

#### 6-2. ローカルに取り込む

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

#### 6-3. WordPressのテーブル接頭辞を本番に合わせる

本番ではテーブル名が `wpa3c285_xxx` で始まってる。ローカルのWPに教える：

```bash
docker exec thinca_wp sed -i "s/getenv_docker('WORDPRESS_TABLE_PREFIX', 'wp_')/'wpa3c285'/" /var/www/html/wp-config.php
```

### Step 7: URL置換（本番URL → localhost）

データベース内に本番URL（https://www.thinca.co.jp）が残ってるので、`localhost:8080` に置き換える。

#### 7-1. wp-cliをインストール

```bash
docker exec thinca_wp bash -c "curl -sO https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp"
```

#### 7-2. URL置換実行

```bash
docker exec thinca_wp wp search-replace 'https://www.thinca.co.jp' 'http://localhost:8080' --allow-root --skip-columns=guid
```

→ 「Success: Made X replacements」と出れば成功

### Step 8: 本番特有の `/wp/` ディレクトリ構造に対応

本番では WordPress 本体が `/wp/` サブディレクトリにある特殊構成。ローカルでもそれを再現：

```bash
docker exec thinca_wp bash -c "mkdir -p /var/www/html/wp && ln -sf /var/www/html/wp-content /var/www/html/wp/wp-content && ln -sf /var/www/html/wp-includes /var/www/html/wp/wp-includes && ln -sf /var/www/html/wp-admin /var/www/html/wp/wp-admin"
```

### Step 9: 動作確認

ブラウザで開く：

```bash
open http://localhost:8080
```

→ もしSSL接続エラーが出たら：
- ブラウザ右クリック → シークレットウィンドウで開く
- もしくは Chrome の場合 `chrome://net-internals/#hsts` で `localhost` を Delete

→ ハードリロード：**Cmd + Shift + R**

🎉 **本番と同じコーポサイトが localhost で見えたら完了！**

---

### トラブルシューティング

| 症状 | 対処 |
|---|---|
| Docker起動エラー | Docker Desktopが起動してるか確認 |
| `localhost:8080` で「このサイトは安全に接続できません」 | Step 9のシークレットウィンドウ / HSTS削除を試す |
| CSSや画像が読み込まれない | Step 8の `/wp/` シンボリックリンクを再実行 |
| データベース接続エラー | Step 6-3 の table_prefix が `wpa3c285` になってるか確認 |
| 画像が一部表示されない | Step 5 の `assets/` 取得を再実行 |
| ファイルアップロードで「2MB超過」 | uploads.ini が反映されてない。`docker compose down && docker compose up -d` でコンテナ再作成 |

---

### よく使うコマンド集

| やりたいこと | コマンド |
|---|---|
| Docker起動 | `cd ~/Documents/projects/thinca-corporate-wp && docker compose up -d` |
| Docker停止 | `cd ~/Documents/projects/thinca-corporate-wp && docker compose down` |
| ログ確認 | `docker compose logs -f` |
| WordPressコンテナに入る | `docker exec -it thinca_wp bash` |
| MySQLコンテナに入る | `docker exec -it thinca_db mysql -uroot -prootpass thinca_wp` |
| キャッシュクリア | `docker exec thinca_wp wp cache flush --allow-root` |

---

## 本番からのデータ移行手順（参考・上の詳細ガイドの要約版）

1. **テーマファイル取得**: SSH/FTPで本番 `wp-content/themes/` を `./wp-content/themes/` にコピー
2. **画像取得**: 本番 `wp-content/uploads/` を `./wp-content/uploads/` にコピー
3. **プラグイン取得**: 本番 `wp-content/plugins/` を `./wp-content/plugins/` にコピー
4. **DBダンプ取得**: 本番 phpMyAdmin でエクスポート → ローカル取り込み（プレフィックス調整含む）
5. **URL置換**: `wp-cli` の `search-replace` で本番URLをlocalhostに置換
6. **`/wp/` 対応**: シンボリックリンク作成

## Git管理ルール

- テーマ・プラグインのコード → Git管理
- 画像（wp-content/uploads/） → Git管理外（容量大）
- DB → Git管理外（ローカル別管理）
- 機密情報（.env等） → Git管理外

## 関連ドキュメント

- 親プロジェクト: マーケティング部 コーポレートサイト内製化
- キックオフ資料: [marketing-corporate-site-kickoff-v1.md](https://app.notion.com/p/3685d3440f088125a8caeae430e74c70)

## 進捗ログ

### 2026-06-08 Phase 0 完了
- ✅ Docker環境（WordPress + MySQL 8.0 + phpMyAdmin）構築・起動確認
- ✅ Git管理開始、GitHub Privateリポジトリ連携
- ✅ 本番データ移行（**All-in-One WP Migration**プラグイン経由）
  - 本番でExport時、Advanced optionsで以下を除外して軽量化:
    - media library（画像900MB → 後日rsync予定）
    - must-use plugins
    - spam comments
    - post revisions
  - 結果: フロント画面はテキスト・レイアウト表示OK
- ✅ ローカル環境調整:
  - `uploads.ini` でPHP upload上限を 2M → 1024M に拡張
  - `wp-config.php` に `WP_DEBUG_DISPLAY = false` を追加（ACF旧版のtextdomain警告が画面出力されwp-loginが壊れる現象を回避）

### 2026-06-10 Phase 0+ 本番完全同期完了
- ✅ **本番サーバ情報判明**: さくらインターネット / 本番WPパス `/home/kaicloud/www/www-thinca-co-jp`
- ✅ **画像取得**（636MB・3372ファイル）: rsync経由で `./wp-content/uploads/` に同期
- ✅ **サイトルート `/assets/` 取得**（6.6MB）: カスタム実装で `wp-content/uploads/` ではなくサイトルート直下に画像配置されていた
  - `docker-compose.yml` の volumes に `./assets:/var/www/html/assets` 追加
- ✅ **本番DB完全同期**: phpMyAdminからエクスポート(200MB.sql.gz) → コマンド経由で取り込み
  - 注意: 本番DBは複数サイト同居（5サイト分のテーブルが283個）
  - 該当プレフィックスは `wpa3c285`（コーポサイト用）
  - `gunzip -c ... | sed '/^CREATE DATABASE/d; /^USE /d' | docker exec -i thinca_db mysql ...` でCREATE文除外しつつインポート
- ✅ **table_prefix を `wp_` → `wpa3c285` に変更**:
  - Docker公式WPイメージのwp-config.phpは `getenv_docker('WORDPRESS_TABLE_PREFIX', 'wp_')` 形式
  - `sed -i "s/getenv_docker('WORDPRESS_TABLE_PREFIX', 'wp_')/'wpa3c285'/"` で直接書き換え
- ✅ **wp-cli導入**（コンテナ内）→ **URL置換**: `wp search-replace 'https://www.thinca.co.jp' 'http://localhost:8080' --skip-columns=guid`
- ✅ **「Giving WordPress its own directory」パターン対応**:
  - 本番は `/wp/` サブディレクトリにWPコア配置（CSS/JS等が `/wp/wp-content/...` 参照）
  - シンボリックリンクで対応: `/var/www/html/wp/{wp-content,wp-includes,wp-admin}` → 実体への参照
- ✅ **フロント完全表示OK**

### 🟡 次回検討
- [ ] Phase 1: Next.js + WPGraphQLヘッドレス化の設計検討
- [ ] 本番DBの定期同期フロー（更新差分の取り込み）
