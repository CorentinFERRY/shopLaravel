## Vérification des prérequis 

### PHP (doit afficher 8.4 ou plus)
`php -v`

### Composer (doit afficher 2.x)
`composer -v`

### MySQL/MariaDB (doit être accessible)
`mysql --version`

### Git (doit afficher 2.x)
`git --version`

---


## Cloner le projet en local

`git clone https://github.com/CorentinFERRY/shopLaravel.git `

---

## Installer les dépendances avec composer

`composer install`

## Configurer la base de données

`mysql -u root -p <password>`

``` 
CREATE DATABASE shoplaravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
EXIT; 
```
--- 

## Configurer le .env avec les identifiants (ou cc .env.example)

## Lancer les migrations avec les seeders 

`php artisan migrate --seed`

---

## Lancer le serveur 

` php artisan serve `

## Tester l'application

Ouvre ton navigateur à http://localhost:8000