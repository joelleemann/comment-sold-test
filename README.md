###Built using with Laravel, using Sail
##Starting Project
Run the command `sail up` or `docker-compose up -d` from the root project directory, to start the server

Move/copy files `inventory.csv`, `orders.csv`, `products.csv`, and `users.csv` into `storage/app/`

run `php artisan migrate:fresh --seed` to import all the data into the database

Visit `localhost` to view the app.
