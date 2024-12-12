

## setup

` composer require laravel/sail --dev `

` php artisan sail:install `
` sail  artisan db:seed --class=CreateAdminUserSeeder `


#### add alias to .bashrc file
` alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' `
and then restart your shell.

` composer install `

` sail up `

` npm i`

`nvm use 20`

`npx vite build`

#### after sourcing schema and running seeds

` sail artisan migrate `

## start application

` sail up `

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

admin:
admin@gmail.com
passsword:
P0t4?6wen

