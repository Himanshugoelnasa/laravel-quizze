# Laravel Online Quiz Application (based on Laravel 8.x)

-   Application to manage and take the quiz online.
-   User can perform and manage tests.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

# Demo

Check the following demo project. 

**[View demo](http://laravel-quizze-2d95963d3b55.herokuapp.com)**

Note: The url have SSL issue so kindly try to use Mozilla Firefox for now, other brwosers can have issue. This issue will be resolved soon.

Register and login to take quizze

# Installation

1. **Clone or download this Repository.**
2. **Run the command**

    ```
    composer install
    ```

    if you get any problems while running above command then run the following command.

    ```
    composer install --ignore-platform-reqs
    ```

3. **Create `.env` file by copying the `.env.example`, or run the following command**

    ```
    cp .env.example .env
    ```

4. **Update the database name and credentials in `.env` file**
    ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE="Your database name"
     DB_USERNAME="your database username"
     DB_PASSWORD="your database password"
    ```
5. **Run the following command (This command will run migrations and seeder)**

    ```
    php artisan migrate --seed
    ```

6. **Install the Laravel UI package**

    ```
    composer require laravel/ui
    ```

7. **Generate auth scaffolding**

    ```
    php artisan ui react --auth
    ```

8. **Run npm command**
    ```
    npm install
    ```
9. **Run the command to compile the assets**
    ```
    npm run dev
    ```
10. **Finally run the application**
    ```
    php artisan serve
    ```

# Contributing

This project is open for contributions so Pull requests and Issues are welcome.
