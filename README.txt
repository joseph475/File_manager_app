#After cloning

- composer install
- npm install
- make a copy of '.env.example' and save as .env file then change the database name to 'file_manager_app'
- create mysql database named 'file_manager_app'
- execute command php artisan migrate
- create a folder named 'files_uploaded' in '/storage/app/public'
- execute command php artisan storage:link
- ececute command php artisan key:generate 
- execute command php artisan serve

#Runnings Tests    ###First time doing Test Cases 

- vendor/bin/phpunit --filter 'test_dashboard_view' ###Test if dashboard will render  
- vendor/bin/phpunit --filter 'test_uploads_view' ###Test if uploads will render 
- vendor/bin/phpunit --filter 'test_welcome_view' ###Test if welcome will render
- vendor/bin/phpunit --filter 'testUploadFile' ###Test if the file will be uploaded
 



