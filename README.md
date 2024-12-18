

## setup

  add .env 

`composer require laravel/sail --dev `

`php artisan sail:install `

add alias to .bashrc file
` alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' `
and then restart your shell.

` composer install `

` sail up `

In seperate terminal:

`mysql -h 127.0.0.1 -P 3307 -u root -p`
Enter password

`use task_db`

`source ./databse/schema.sql`

`source ./databse/sample_data.sql`

`exit`

`sail artisan migrate `

In seperate terminal:

`nvm use 20`

`npm i`

`npx vite build`

`npm run dev `


## start application

In one terminal run:
` sail up `

In second terminal run:

`nvm use 20`
` npm run dev `

### if not using alias
` ./vendor/bin/sail up `

` npm run dev `

## troubleshooting
if migration doesn't complete run

` sail artisan migrate:fresh `

then run again 

## inspecting models
 
 to inspect individuals models run
 
 ` sail artisan model:show <name of model>`

 ## view routes

 ` sail artisan route:list `

 ## login
 user:
 fakeuser@gmail.com

 password:
 password



## check logs
run the following command:
`less./storage/logs/laravel.log`

