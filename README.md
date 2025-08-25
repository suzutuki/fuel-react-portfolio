# FuelPHP + React ポートフォリオ

FuelPHPのAPIとReact TypeScriptで作ったポートフォリオサイトです。XAMPP環境で動きます。

## 機能

- FuelPHP（バックエンド）+ React TypeScript（フロントエンド）
- スマホ対応のレスポンシブデザイン
- REST API
- MySQL連携
- XAMPP対応
- TypeScript完全対応

## フォルダ構成

```
fuel-react-portfolio/
├── api/                          # FuelPHP側
│   ├── fuel/
│   │   ├── app/
│   │   │   ├── classes/
│   │   │   │   ├── controller/   # APIコントローラ
│   │   │   │   └── model/        # モデル
│   │   │   └── config/           # 設定
│   │   └── core/                 # FuelPHPコア（要インストール）
│   └── public/                   
├── frontend/                     # React側
│   ├── src/
│   │   ├── components/           # コンポーネント
│   │   ├── pages/               # ページ
│   │   ├── services/            # API関連
│   │   ├── types/               # 型定義
│   │   └── utils/               
│   └── public/                  
├── database/                    # DB関連
├── .htaccess                   
└── xampp-config.md             
```

## セットアップ

### 必要なもの

- XAMPP（Apache、MySQL、PHP 7.4+）
- Node.js（v16+）
- npm

### 1. FuelPHPダウンロード

https://fuelphp.com/downloads から1.8.xをダウンロードして、`api/fuel/core/`に展開してください。

### 2. パッケージインストール

```bash
npm run install:all
```

### 3. データベース準備

1. XAMPPでApacheとMySQLを起動
2. phpMyAdmin（http://localhost/phpmyadmin）を開く
3. `portfolio_db`データベースを作成
4. `database/schema.sql`をインポート
5. 必要に応じて`database/seeds.sql`もインポート

### 4. 設定

1. `api/fuel/app/config/db.php`でDB接続情報を設定
2. `xampp-config.md`を参考にXAMPPを設定
3. Apacheのmod_rewriteが有効になっているか確認

### 5. 起動

```bash
# 開発用
npm run dev

# 本番用ビルド
npm run build
```

## API

- `GET /api/portfolio` - ポートフォリオ情報
- `GET /api/projects` - プロジェクト一覧
- `GET /api/projects/{id}` - プロジェクト詳細
- `GET /api/skills` - スキル情報
- `POST /api/contact` - お問い合わせ送信

## ページ構成

- **トップページ**: 自己紹介、注目プロジェクト、スキル
- **プロジェクト**: 作品一覧（フィルタ機能付き）
- **お問い合わせ**: コンタクトフォーム
- ハンバーガーメニュー対応

## 開発用コマンド

```bash
npm run dev          # 開発サーバー起動
npm run build        # 本番ビルド
npm run test         # テスト実行
npm run setup        # 初期セットアップ
```

### フロントエンド単体

```bash
cd frontend
npm start            # React開発サーバー
npm run build        # ビルド
npm test             # テスト
```

## レスポンシブ対応

- デスクトップ（1200px以上）
- タブレット（768-1199px）
- スマホ（768px未満）

## カスタマイズ

### コンテンツ更新

1. **プロジェクト**: DBの`projects`テーブルを編集
2. **スキル**: DBの`skills`テーブルを編集
3. **プロフィール**: `api/fuel/app/classes/controller/portfolio.php`を編集
4. **デザイン**: 各コンポーネントのCSSを編集

### 機能追加

1. **API**: `api/fuel/app/classes/controller/`にコントローラ追加
2. **画面**: `frontend/src/components/`にコンポーネント追加
3. **DB**: `database/schema.sql`を更新

## 公開

### ビルド

```bash
npm run build
```

### 公開先

1. **レンタルサーバー**: public_htmlにアップロード
2. **VPS**: Apacheの設定
3. **クラウド**: Heroku、DigitalOceanなど

## セキュリティ

- CORS設定済み
- SQLインジェクション対策（ORM使用）
- XSS対策
- 入力値検証

## よくある問題

### API が404エラー

- mod_rewriteが有効か確認
- .htaccessファイルがあるか確認

### DB接続エラー

- MySQLが起動しているか確認
- `config/db.php`の設定を確認

### CORS エラー

- APIコントローラでCORSヘッダーを送信しているか確認

詳しくは`xampp-config.md`を見てください。

## ライセンス

MIT License

---

FuelPHP + React + TypeScriptで作成
