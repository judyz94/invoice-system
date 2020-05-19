# invoice_system
Program to control invoices in PHP. Designed to execute the challenge proposed as an aspiring junior developer, for the payment gateway company, PlacetoPay.

Installation
1. Clone the repository on the root (command: git clone + URL to clone with HTTPS of GitHub).
2. Execute the following commands on the console, located in the project folder:
    - git pull origin
    - composer install
    - cp .env.example .env
    - configure .env file:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=invoice_system
        DB_USERNAME=root
        DB_PASSWORD=
    - mysql -u root
        mysql> create database invoice_system;
        mysql> exit
    - php artisan key:generate
    - php artisan migrate --seed
    - php artisan cache:clear
    - php artisan view:clear
    - npm ci
    - npm run prod
    - php artisan serve
