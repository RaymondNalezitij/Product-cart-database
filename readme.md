<h2 align="center"> Webpage Preview </h2>
<p align="center">
  <img src="https://user-images.githubusercontent.com/102956031/196000623-e0b3ea1e-9509-49dd-8275-2b01e2f2ee0f.gif">
</p>


<h1>Description</h1>

Product and cart page using laravel framework.

Using the app you can:
- Add, remove & update product stock at any time.
- Manage user cart by adding or removing products.
- Get cart subtotal, vat amount and total at any time.
- Register and login as a user

The code is wirtten entirely in english.

<h1>Project requirements</h1>

---

- Node.js >= 18.07
- PHP >= 8.0
- Laravel >= 9.0
- composer >= 2.3.3

<h1>Installation</h1>

---

1. Installing PHP on the system. Installation guides for all systems can be found
   here: ```https://www.php.net/manual/en/install.php```

2. Downloading and installing composer. Command line:
   Download: ```php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"```
   Local install: ```php composer-setup.php```
   Global install: ```php composer-setup.php --install-dir=/usr/local/bin --filename=composer```
   Test: ```composer```
   Or use the installer from ```https://getcomposer.org/```

3. Install Laravel. laravel installation guide ```https://laravel.com/docs/9.x/installation```
   Or install using composer: ```composer global require laravel/installer```

4. To add a database to the project you will need to install MySql installation guide: ```https://ubuntu.com/server/docs/databases-mysql```

5. Finally, we will need npm which comes with Node.js.
   Node.js installation guide can be found here ```https://nodejs.org/en/```

6. To finish npm installation run:
    - ```npm install```
    - ```npm run build```

7. Install laravel dependencies using: composer install

8. Go to project directory rename the .env.example to .env and if needed change the:
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD

   to the parameters that you have set for your mysql

9. To test the functions run ```php artisan test```

10. To run the project in your terminal run : ```php artisan serve```
