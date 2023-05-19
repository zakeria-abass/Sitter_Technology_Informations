<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>





## About Project  
- Multiple authentication (administrator, instructor and student)
- Setting exams for each course with a course schedule, knowing the results of the student after submitting the exam, and recorded videos for the course




## How to run the code

- cp .env.example `.env`
- open .env and update DB_DATABASE (database details)
- run : `composer install`
- run : `php artisan key:generate`
- run : `php artisan migrate --seed`
- run : `php artisan serve`




