# Blank Wordpress Site

## Prerequisites
This project used node js and gulp. To check you have node and npm installed, type -
```
node -v
npm -v
```

If you have not installed gulp globally, you will need to type `npm install gulp --global`.
If this is the first time using node modules globally, you might get an EACCES error. You can fix this by changing your permissions for npm default directory.
Goto the [npm website](https://docs.npmjs.com/getting-started/fixing-npm-permissions) for details.


## Setup
Add url to host file
```
  sudo nano /etc/hosts
```

Add paths to vhosts file replacing the '#' with file path and url to be used
```
  <VirtualHost *:80>
    ServerAdmin webmaster@example.com
    DocumentRoot /Users/###/Development/###
    ServerName ###.localhost

    <Directory /Users/###/Development/###/>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order Allow,Deny
        Allow from all
    </Directory>
    ErrorLog "logs/###-error_log"
    CustomLog "logs/###-access_log" common
  </VirtualHost>
```

After doing this restart mamp/local server.

##Create database & user

Using Sequel Pro (or another MySQL db manager) create a new table and a new user then given it full permissions. Flush privileges after doing this.

### Install WP-CLI (http://wp-cli.org/)

```
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

### Install WordPress into project

```
wp core download --locale=en_GB
```

cd to the `wp-content/themes/blank` directory and run
```
npm install
```

which will install all your development dependencies.

To compile the SCSS` javascript and compress all the images ready for build, type
```
gulp
```

this will run the default gulp task and run a watch for changes.

