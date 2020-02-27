# lightning-skin-sample

Lightningのデザインスキン開発用です。

ディレクト名
lightning-skin-スキン名

## 使い方

まずは必要なパッケージをインストール

```
npm install
```

gulp で自動ビルドされます

```
gulp
```

停止する時は Ctrl + C

---

## CSSファイル構造について

### assets/_scss/

デザインするscssファイルは　assets/_scss に入っています。

| ファイル名 | 用途例 |
| ---- | ---- |
| _variables.scss | 文字色や文字サイズなどの指定 |
| _common.scss | 主に本文欄に入る見出しや段落など |
| _gmenu.scss | グローバルメニュー用 | 
| _variables.scss | 文字色や文字サイズなどの指定 |
| _vk_post_adjuster.scss | 投稿リストブロック / MediaPosts BS4 ウィジェットなどの部分の上書き用 |
| editor.scss | 編集画面用 | 
| style.scss | 公開画面用 | 
| style_late.scss | フッターの最後の方で読み込むscssファイル | 

### assets/foundation/

Lightning 共通で使うと思われるSCSSファイル一式（レイアウトやメニュー処理など）が入っている。

もしテーマをアップデートして何か表示不具合が発生したら Lightning の /design-skin/foundation/ に同様のものがあるので、コピーしてきれ上書きすれば改善するかもしれません。