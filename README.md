## MANASOFT-SYMFONY-AUTH-APP
🔐 A basic app for user authentication built with Symfony 4.4

### Requirements
- [Composer](http://getcomposer.org) 📦
- [PHP](https://php.net) (^7.1.3) 🐘

### Installation
Clone this repository onto your local machine
```bash
git clone https://github.com/iamwebwiz/Manasoft-Symfony-Auth-App.git
```
Change current working directory to the newly cloned project
```bash
cd Manasoft-Symfony-Auth-App
```

Create `an empty database` for the project.

Copy the content of `.env.example` to a `.env` file or rename it then fill in the database credentials in the `.env` file
```bash
cp .env.example .env
```

```text
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```
Change `db_user` to your database user, `db_password` to your database password, and `db_name` to the name of the empty database you just created.

Install composer dependencies
```bash
composer install
```

Create the database schema 
```bash
bin/console doctrine:schema:create
```

Generate predefined user fixture for login 🔑
```bash
bin/console doctrine:fixtures:load
```
This command will populate the `user` table in the database with a user record. The password for this user is `password`. The password was hashed using `bcrypt` algorithm.

Start the server!
```bash
bin/console server:start
```

The server status can be checked with `bin/console server:status` and can be stopped with `bin/console server:stop`.

Navigate to the address displayed when your server start and you should have the app screen sitting there.

