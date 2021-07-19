## Prerequisite

-   mysql v8.0.23
-   php v7.4.21
-   composer v2.1.3
-   node v14.16.0

## Installation

```bash
git clone https://github.com/ismayilibrahimov/minicrm.git
cd minicrm
composer install
npm install
npm run dev
```

create .env file by coping .env.example file.
after that run this command

```bash
php artisan key:generate
```

create database at mysql

```bash
mysql -u root -p
create database minicrm;
```

add database credentials to .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=minicrm
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

## Usage

run this commands at your console

```bash
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan storage:link
php artisan serve
```
