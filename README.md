# Laravel-Admin
Quick laravel starter for admin apps with [Admin-LTE](https://github.com/almasaeed2010/AdminLTE), [Laravel-permission](https://github.com/spatie/laravel-permission) and [Laravel-datatables](https://github.com/yajra/laravel-datatables)

## Prerequisites
- [PHP](http://www.php.net) with configured CLI
- [Composer](https://getcomposer.org/download)
- [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli)

## Development

### Installing
```
composer install
```

### Running the app locally
```
php artisan serve
```

### Notes
- `php artisan make:controller ControllerName --migration` (generate controller with migration)
- `php artisan make:model ModelName` (generate model)
- `php artisan make:seed SeedName` (generate db seed)
- `php artisan migrate` (run migration)
- `php artisan migrate:reset` (reset migration)
- `php artisan migrate:refresh` (refresh migration)
- `php artisan db:seed` (seed database)

## Deploying to heroku
```
git push heroku master
```

## Demo 
[http://laravel-starter.herokuapp.com](http://laravel-starter.herokuapp.com)
```
Demo user: 
- email: admin@email.com
- pass : admin12345
```

## FAQ
- How to set heroku env variables ? `heroku config:set ENV_VAR=value`
- How to run command on heroku ? `heroku run php artisan migrate`
- To find another useful commands use `heroku --help`
