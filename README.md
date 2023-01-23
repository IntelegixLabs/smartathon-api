# API for Smartathon Client

This is an API for Smartathon Admin Web Dashboard from where an admin can manage its data received from user's car dashcam.
It is a backend server to serve the client.

Technologies used: Laravel 9, Laravel Sanctum.

Install Docker.

<strong>Note: Make Sure Docker is installed with WSL 2 (for Windows)</strong>


Install Composer:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```


Clone the repo:
- ```git clone https://github.com/IntelegixLabs/smartathon-api.git```
- ```cd smartathon-api```


To get started follow commands below:
1. Type the command: ```sudo apt install software-properties-common```
2. ```sudo add-apt-repository ppa:ondrej/php```
3. ```sudo apt update```
4. Install PHP and required extensions: 
```
sudo apt install php8.1 php8.1-opcache php8.1-pdo php8.1-xml php8.1-bcmath php8.1-calendar php8.1-ctype php8.1-curl php8.1-dom php8.1-exif php8.1-ffi php8.1-fileinfo php8.1-ftp php8.1-gd php8.1-gettext php8.1-iconv php8.1-mbstring php8.1-phar php8.1-posix php8.1-readline php8.1-shmop php8.1-simplexml php8.1-sockets php8.1-sysvmsg php8.1-sysvsem php8.1-sysvshm php8.1-tokenizer php8.1-xmlreader php8.1-xmlwriter php8.1-xsl php8.1-zip
```

Spring up the Server: ```./vendor/bin/sail up```

The above command will install Laravel Sail Docker container with required dependencies.

- Once the setup is complete (it will take around 15 minutes depending on your Internet Connection), let the Laravel Sail running.
- Open another ubuntu terminal window (also on WSL) and navigate to <strong>smartathon-api</strong> directory.
- Type the command: ```sail artisan migrate:fresh --seed```
