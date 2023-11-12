How to install an existing laravel project

Ensure you have a local server with mysql running ..

1. Find the project in git (example: https://github.com/majebry/eta-store)

Press "Code" and copy the Link

2. In the terminal, go to your the local server served directory: (example: "www")

Run command: `git clone (paste the copied link)` : it will clone the project from git to your work directory

3. `cd` into the created new project directory: (example: `cd eta-store`)

4. Run `composer install` to get the php dependencies

5. Copy `.env.example` file from the cloned project in the same path,
name it: `.env`

edit configurations (like database name) inside `.env` file

6. If there are migrations, run `php artisan migrate --seed`

7. Run the project from the browser (example if you are using Laragon: http://eta-store.test)