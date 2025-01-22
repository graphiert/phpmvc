# PHP MVC

Simple PHP MVC app, powered by Eloquent and Twig.

## How it works?

For first run, please run migrations table (and maybe the seeder).

```
cd cli
php migrate.php
php seed.php
```

Run this project using PHP local development server.

```
php -S localhost:8000 -t public
```

Access localhost on port 8000, and you will see "Hello World".

## How to modify?

1. Open `bootstrap/routes.php`and modify or add the routes.
   See accepted method on `app/Router.php`.
2. Create controller file on `controllers/` folder.
   There are no rules to write controller name as long as you know where and what this controller do.
3. Create view file on `views/` folder. This project using Twig so you should know how to use Twig.
   And call your view on controller using `App::view()` static method.
4. You are welcome to use CSS/JS/static assets. Place your static assets on `public/` folder.
   Or, you can use Tailwind CSS for styling. Run `npm i` and run Tailwind CSS to compile.
5. Database, models and related stuff powered by Laravel Eloquent.
   Create file and copy the sample on `models/` folder to create a model.
   Setup your table migrations on `database/schema.php`.
