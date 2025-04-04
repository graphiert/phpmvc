# PHP MVC

Simple PHP MVC app, powered by [Eloquent](https://laravel.com/docs/eloquent), [Twig](https://twig.symfony.com/doc) and [symfony/http-foundation](https://symfony.com/doc/current/components/http_foundation.html).

## How it works?

Install all requirements via Composer

```
composer install
```

For first run, please run migrations table (and maybe the seeder).

```
cd database
php run migrate
php run seed
```

Run this project using PHP local development server.

```
php -S localhost:8000 -t public
```

Access localhost on port 8000, and you will see "Hello World".

## How to modify?

1. Open `app/routes.php`and modify or add the routes.
   See accepted method on `core/Router.php`.
2. Create controller file on `app/controllers/` folder.
   There are no rules to write controller name as long as you know where and what this controller do.
3. Create view file on `app/views/` folder. This project using Twig so you should know how to use Twig.
   And call your view on controller using `App::view()` static method.
4. You are welcome to use CSS/JS/static assets. Place your static assets on `public/` folder.
   Or, you can use Tailwind CSS for styling. Run `npm i` and run Tailwind CSS to compile.
   Static assets relative by public folder.
5. Database, models and related stuff powered by Laravel Eloquent.
   Create file and copy the sample on `app/models/` folder to create a model.
   Setup your table migrations on `database/schema.php`.
