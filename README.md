# DOT_SMS_APP
*** Send SMS without a Gateway API in a Laravel Application *** 
<br><br>
Send SMS without a Gateway API Laravel Application. (contact me on kidane12g@gmail.com for more information)
<br>
*** Getting Started ***
<br>
Clone this repository
<br>
git clone https://github.com/kidane-gebremedhin/SMS_APP.git
<br>
Change Directory
<br>
cd SMS_APP
<br>
install all dependencies
<br>
composer install 
<br>
Copy .env.example to .env
<br>
cp .env.example .env
<br>
Generate Application secure key (in .env file)
<br>
php artisan key:generate
<br>

*** Database Connection Setup ***
<br>
Create a database and update .env file with database credentials
<br>
DB_CONNECTION=mysql
<br>
DB_HOST=127.0.0.1
<br>
DB_PORT=3306
<br>
DB_DATABASE=Your-database-name
<br>
DB_USERNAME=Your-database-username
<br>
DB_PASSWORD=Your-database-password
<br>
*** Run migrations ***
<br>
php artisan migrate
<br>
Serve the Application
<br>
php artisan serve
<br>
<br>
Connect your SMS USB Modem
<br>
That's It! Now you can send SMS messages to any number :)
