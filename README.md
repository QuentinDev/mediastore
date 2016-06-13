# mediastore

renomer app/config/Database.php.sample en Database.php

## install

```sh
composer install
composer dump-autoload
```

## Commande Database

```sh
php app/databases/migrate_down.php
php app/databases/migrate_up.php
php app/databases/seed.php
```

## vendors
https://github.com/illuminate/database