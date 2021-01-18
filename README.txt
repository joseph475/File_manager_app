after cloning
- composer install
- npm install
- make a copy of '.env.example' and save as .env file then change the database name to 'file_manager_app'
- create mysql database named 'file_manager_app'
- execute php artisan migrate
- create a folder named 'files_uploaded' in '/storage/app/public'
- execute command php artisan storage:link
- php artisan key:generate 
- php artisan serve