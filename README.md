## Prerequisite

-   mysql v8.0.23
-   php v8.0.8
-   composer v2.1.3
-   node v14.16.0

## Installation

```bash
git clone https://github.com/ismayilibrahimov/minicrm.git
cd minicrm
composer install
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

run this commands at you console

```bash
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan storage:link
php artisan serve
```
