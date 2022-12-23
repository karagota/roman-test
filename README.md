This is a project  based ob Laravel 9.3.12 which consists of:

1) **App/Console/Commands/AuthToken.php**
    A command which runs with "php artisan get-token some-user-login some-password"
    and issues an authorization token which lasts for 5 minutes
2) **App/Http/Contollers/JsonStoreController.php** (Frontend)
       **index**  - displays a page with a form to enter json data, choose form method and save json data to database
       **storeJson** - saves data to database. Demands authorization.
3) **App/Http/Controllers/AdminController.php** (Backend)
       **index** - displays a page with a list of json objects in a tree view
       **delete** - deletes the json object from database
       **edit** - displays a page with a form to edit raw json
       **save** - saves updated json to a database.
4) **Tests/Feature/TokenTest.php**
   **test_get_token_command** - tests get-token command
   **test_json_store** - tests creating a new json record in a database
   **test_json_delete** - tests deleting a json record from a database
   **test_json_update** tests saving modified json record to a database

**Database important tables**:
   
1) **users** - modified from original table by removing email as unique login.
        Added field "login" as a unique login<br>

2) **personal_access_tokens** - modified from original table by removing token_name<br>

3) **js_data** - consists of id, data, created_at, updated_at. Contains json data.

test user credentials: login **karagota**, password **12345**.
