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
