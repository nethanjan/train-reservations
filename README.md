# Assesment

### Set up laravel

chmod 755 sotage/ bootstrap/cache
php artisan key:generate

create .env file by .env.exmaple and add your enviroment variables for the database configarations

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

### Run

php artisan migrate
php artisan db:seed (Admin user seed)

npm install
npm run dev

php artisan serve

### Login

User : admin@solomoIt.com
Password : password
