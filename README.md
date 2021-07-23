###Built using with Laravel, using Sail
##Instructions for Running the App
1. Run the command `sail up` or `docker-compose up -d` from the root project directory, to start/build the docker image
1. ssh into docker via `docker-compose exec laravel.test /bin/bash`
1. Run `php artisan migrate:fresh --seed` to import all the data into the database
1. Run `npm run dev`
1. Visit `localhost` to view the app.
