
## Getting started:

### Enable the Required Extension:

- If the issue persists, you may need to enable the sockets extension in your PHP configuration. You can typically do this by uncommenting the line extension=sockets in your php.ini file and then restarting your web server.

### Installing:

- composer install
- php artisan migrate 
- php artisan serve



### Setting Accept Header

- "Specify 'Accept: application/json' in the headers of your HTTP requests to indicate that you prefer JSON-formatted responses from the server. 

### REST API Endpoint: 

- GET /api/posts
- GET /api/posts/{post_id}
- POST /api/posts
- PUT /api/posts/{post_id}
- DELETE /api/posts/{post_id}

### Running Queue Worker with RabbitMQ

- php artisan queue:work rabbitmq
