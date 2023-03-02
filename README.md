# Ekurie

A collaborative learning platform for university students that needs to learn pedagogique material by heart

## SetUp on your local machine

1. clone the repo

> git clone https://github.com/robin-papazian/Ekurie.git

2. rename template-env to .env
3. copy-paste and edite the script below in your new .env file

```
APP_ENV=dev
APP_SECRET=YOUR SECRET KEY HERE
DATABASE_URL="mysql://HOSTNAME:PASSWORD@127.0.0.1:3306/ekurie
CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'
```

4. install the dependances

> composer install

5. create the database

> php bin/console doctrine:database:create

5. make the migrations

> php bin/console doctrine:migrations:migrate
