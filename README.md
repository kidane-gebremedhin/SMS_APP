# DOT_SMS_APP
*** Send SMS without a Gateway API in a Laravel Application ***
Send SMS without a Gateway API Laravel Application. (contact me on kidane12g@gmail.com for more information)

*** Getting Started ***
Clone this repository

git clone https://github.com/kidane-gebremedhin/SMS_APP.git
Change Directory
cd SMS_APP
install all dependencies
composer install 
Copy .env.example to .env
cp .env.example .env
Generate Application secure key (in .env file)
php artisan key:generate

*** Database Connection Setup ***
Create a database and update .env file with database credentials

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Your-database-name
DB_USERNAME=Your-database-username
DB_PASSWORD=Your-database-password

*** Run migrations ***
php artisan migrate
Serve the Application
php artisan serve
