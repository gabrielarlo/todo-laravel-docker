## TODO List Created with Laravel

### Requiredments
1. Php 8.1
2. Laravel 10.x
3. MySql

### Installation
1. run `composer install`
   2. to install the dependencies
2. copy `.env.example` as `.env`
   - to set the environment variables for the database setup
   ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=todo_list_preview_be
    DB_USERNAME=sail
    DB_PASSWORD=password
    ```

3. run `php artisan key:generate` and `php artisan migrate:fresh --seed`
    - to generate new key for your project and running db migrations
4. php `php artisan serve`
   - serving app restful api hosted to `http://localhost:8000`

### Alternatives
- Alternatively you can use sail for this
  - Requirements
    - Docker Desktop installed
  - `./vendor/bin/sail up` to build the application
  - `./vendor/bin/sail composer {command}` for composer commands
  - `./vendor/bin/sail artisan {command}` for artisan commands

### Code Formatting
- `./vendor/bin/pint` to sanitize and format code styles

### Running command inside docker
```dotenv
#Ex:
#docker exec -ti <container name> bash

docker exec -ti todo-list-preview-be_laravel.test_1 bash
```

### Done!
