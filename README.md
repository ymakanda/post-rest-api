
# REST API in Laravel using Dependency Injection

Post REST API is built by using Dependency Injection(constructor injection) Laravel(10.*)

## Prerequisites/ has been tested
-   Laravel v10.48.7 (PHP v8.1.28) 
- Must have a working DB like Mysql or any preferable
-or  Docker to create URL to test the app
- Visit https://laravel.com/docs/10.x for references 

## Installation

Clone the repository locally 
``` git clone git@github.com:ymakanda/post-rest-api.git ```

- cd to your working directory ``` cd post-rest-api ```
- copy from .example to new  `.env` file and update your DB details
- Install composer and npm 
-

## To run it 

```bash
    php artisan migrate
``` 
```bash
    npm run dev or php artisan serve
```
## Testing the API

    You can use tools like Postman or curl to test your API endpoints.

### Create a new post::
    ```bash
        curl -X POST -H "Accept: application/json" -H "Content-Type: application/json" -d '{"title": "New Post", "body": "This is the body of the new post"}' http://localhost:8000/api/posts
    ```

### Get all posts:
    ```bash
        curl -X GET http://localhost:8000/api/posts
    ```

### Get a single post by ID:
    ```bash
        curl -X GET http://localhost:8000/api/posts/1
    ```

### Update a post:
    ```bash
        curl -X PUT -H "Accept: application/json" -H "Content-Type: application/json" -d '{"title": "Updated Post", "body": "This is the updated body of the post"}' http://localhost:8000/api/posts/1
    ```

### Delete a post:
    ```bash
        curl -X DELETE http://localhost:8000/api/posts/1
    ```