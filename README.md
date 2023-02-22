<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Developer Notes

I have attached my exact .env. I used Redis with Predis client for my Queued Jobs
I also left my API ID for the weather API in the .env.example because the weather api has different configurations per api id.
I will delete it in a week's time

### Cities Configuration
Please run this to insert cities in the database
```
INSERT INTO `cities` (`id`, `name`, `country_code`, `lon`, `lat`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'New York', 'US', -75.4999, 40.7143, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(2, 'London', 'GB', -0.1257, 51.5085, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(3, 'Paris', 'US', 2.3488, 48.8534, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(4, 'Berlin', 'US', 13.4105, 52.5244, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(5, 'Tokyo', 'US', 139.6917, 35.6895, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12');

```

### API Test :
```
$ php artisan serve

POST  http://127.0.0.1:8000/api/v1/weather-forecasts
Content-Type: application/json

{
"forecast_date": "22-02-2023"
}
```


ADEO LARAVEL TEST

Instructions


Before you start


- Initiate a fresh`Laravel 8.x` (latest) version.
- Setup Git
- Create a public repo on a Git repo manager of choice (Gitlab, Bitbucket, Github ...) for submitting results
- Setup Postman or a similar API testing tool

The Goal

Create a CRUD API for Weather Forecast Model, run cron jobs and setup queue Jobs and setup basic unit Testing.

The overall goal is to showcase the ability to write well optimised Laravel apps with some complexity.


----------


Task Details

Create a Weather Forecast Model to store the weather forecast from a 3rd party vendor.

Create an API to pull the Weather Forecast for the inputted Date. If the selected Date is not in the database, pull it in from the Weather API.
If data for the Date is not available in the Weather API return an error.

When pulling, storing and returning the data get/store/return results for all of the following locations:

- New York
- London
- Paris
- Berlin
- Tokyo

4 Times a day, pull/store/update Weather API results for that day.

Notes:

- Use Jobs at least once
- Use Events at least once
- For Weather API use https://openweathermap.org/api or similar
- Please keep track of time spent on the task

git remote add origin https://github.com/mikebergafu/adeo-weather-forecast.git
git branch -M main
git push -u origin main
