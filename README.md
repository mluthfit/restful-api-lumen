# RESTful API with Lumen and MySQL
This repository is the result of my exploration by creating RESTful API using Lumen and MySQL

## Getting Started
To start running this project locally, you must follow these steps:
First, clone there repository to the your folder.
```
> https://github.com/mluthfit/restful-api-lumen.git
```

Then, open the folder and **install** all packages with composer.
```
> composer update
```

Then, launch the XAMPP control panel and start `MySQL` and `Apache` service.

Then, open `http://localhost/phpmyadmin/` in your browser and create database.

Then, change `DB_DATABASE` value on `.env.example` according to your database name.

Then, change file name from `.env.example` to `.env`.

Next, migrate database with artisan.
```
> php artisan migrate:fresh
```

Last, start the server.
```
> php -S localhost:8000 -t public
```

You can use `Postman` to use request details below.
| Route | HTTP | Body | Description |
| --- | --- | --- | --- |
| /api/contacts | `GET` | None | Get all contacts |
| /api/contacts/:id | `GET` | None | Get a contact |
| /api/contacts | `POST` | {'name': 'John Doe', 'email': 'johndoe@example.com', 'phone': '+1234567890'} | Create a new contact |
| /api/contacts/:id | `PUT` | {'name': 'John Doe', 'email': 'johndoe@example.com', 'phone': '+1234567890'} | Update a contact |
| /api/contacts/:id | `DELETE` | None | Delete a contact