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

## 本番からのデータ移行手順（初回のみ）

1. **テーマファイル取得**: SSH/FTPで本番 `wp-content/themes/` を `./wp-content/themes/` にコピー
2. **画像取得**: 本番 `wp-content/uploads/` を `./wp-content/uploads/` にコピー（任意）
3. **プラグイン取得**: 本番 `wp-content/plugins/` を `./wp-content/plugins/` にコピー
4. **DBダンプ取得**: 本番で `mysqldump` → phpMyAdminでインポート
5. **URL置換**: `wp-cli` の `search-replace` で本番URLをlocalhostに置換

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
