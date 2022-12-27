## Udemy Laravel講座

## ダウンロード方法
git clone <br>
git clone https://github.com/kaji5963/laravel_umarche.git <br>
laravel_umarche.git <br>

git clone ブランチを指定してダウンロードする場合 <br>
git clone -b ブランチ名 https://github.com/kaji5963/laravel_umarche.git <br>

もしくはzipファイルでダウンロードしてください

## インストール方法

cd laravel_umarche <br>
composer install<br>
npm install<br>
npm run dev<br>

.env.example　をコピーして　.env ファイルを作成<br>

.env ファイルの中の下記をご利用の環境に合わせて変更してください<br>。

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=8889<br>
DB_DATABASE=larabel_umarche<br>
DB_USERNAME=umarche<br>
DB_PASSWORD=password123<br>

XAMPP/MAMPまたは他の開発環境でDBを起動した後に<br>

php artisan migrate:fresh --seed<br>

と実行してください。（データベーステーブルとダミーデータ<br>
が追加されればOK）<br>

最後に<br>
php artisan key:generate<br>
と入力してキーを生成後<br>

php artisan serve<br>
で簡易サーバーを立ち上げ、表示確認してください。

## インストール後の実施事項

画像のダミーデータは<br>
public/imagesフォルダ内に<br>
sample.jpg 〜 として<br>
保存しています。<br>

php artisan storage:link で<br>
storageフォルダにリンク後、<br>

storage/app/public/productsフォルダ内に<br>
保存すると表示されます。<br>
(productsフォルダがない場合は作成してください。)<br>

ショップの画像も表示する場合は、<br>
storage/app/public/shopsフォルダを作成し<br>
画像を保存してください。

## section7の補足

決済のテストとしてstripeを利用しています。<br>
必要な場合は .env にstripeの情報を追記してください。<br>
（講座内で解説しています）<br>

## section8の補足

メールのテストとしてmailtrapを利用しています。<br>
必要な場合は .env にmailtrapの情報を追記してください。<br>
（講座内で解説しています）<br>

必要な場合は php artisan queue:workで<br>
ワーカーを立ち上げて動作確認するようにしてください。