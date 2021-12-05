# DOT_SMS_APP
<h2>*** Send SMS without a Gateway API in a Laravel Application ***</h2>
Send SMS without a Gateway API Laravel Application. (contact me on kidane12g@gmail.com for more information)
<br>
<h3>*** Getting Started ***</h3>
Clone this repository
<br>
git clone https://github.com/kidane-gebremedhin/SMS_APP.git
<br>
<br>
Change Directory
<br>
cd SMS_APP
<br>
<h3>install all dependencies</h3>
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

<h3>*** Database Connection Setup ***</h3>
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
<br>
<h3>*** Run migrations ***</h3>
php artisan migrate
<br>
Serve the Application
<br>
php artisan serve
<br>
<br>
<h3>Connect your SMS USB Modem</h3>
<h3>That's It! Now you can send SMS messages to any number :)</h3>
