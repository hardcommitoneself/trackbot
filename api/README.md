# trackbot api

## Install

- Create a database called `trackbot`
- Create a test database called `trackbot_tests`
- `cp .env.example .env`
- Setup your database credentials in the .env file
- `composer install`
- `php artisan migrate --seed`

You can run the tests with:
`./vendor/bin/pest`

And serve the API with:
`php artisan serve`
