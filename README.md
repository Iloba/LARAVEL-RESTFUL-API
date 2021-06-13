<h1>Setting Up the APP<h1/>
  Clone the Repo
    open in vscode
    Create an Empty Database with any name (MYSQL DATABASE ON XAMPP PHP MYADMIN)
    Copy the .env.example to .env file and update the database name accordingly
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=--new-databasename-you created--
    DB_USERNAME=--your-phpmyadmin-username--
    DB_PASSWORD=--your-phpmyadmin-password--
    
    After that install composer dependencies by running 
    composer install
    
   --From the project root folder on your terminal--
    After installing composer dependencies, migrate and seed the database by running
    
    php artisan migrate --seed
    
    This would automatically create the existing database structure in the migration folder and also run the seeder which would create a post and some comments under it 
    for testing
    
    --finally run--
    php artisan optimize:clear
    php artisan key:gen
    
    and run the server by running
    
    php artisan serve
    
    Then Go ahead to test API using post man


