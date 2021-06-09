# Todo

## Concept 

Pour apprendre à utiliser Laravel 8, nous avons eu un projet où nous devions réaliser comme un trello.

## Principe 

Nous devions alors pouvoir nous inscrire, ensuite nous connecter.
Nous pouvions créer des Boards, dans chacun des boards nous avons des Users qui y participent.
Ensuite nous avions des tâches à réaliser.
Enfin pour chaque tâche nous pouvions commenter celle-ci.

Pour chaque partie, il y a toutes les actions de CRUD.

Nous avons également commencé à gérer les autorisations avec les policies pour ne pas avoir accès au board qui ne nous appartiennent pas.


## Lancer le projet

### Création d'une base de données, 

Vous aurez à créer une base de données dans MySQL : 
`sudo mysql`
Une fois dans mysql 

```sql 
CREATE DATABASE homeagame;
 -- CREATE USER  laravel@localhost IDENTIFIED BY 'L4R4V3l' ; --  À faire si vous n'avez pas déjà un utilisateur autre que root
 -- On donne les droit à l'utilisateur
 GRANT ALL ON homeagame.* TO laravel@localhost; 
```

Copier le fichier `.env.example` en `.env` : 

Et remplissez les informations propres à la BDD. 


Installer le projet à l'aide de composer : 
```sh
composer install
```

Créer une clé pour le .env
```sh
php artisan key:generate
```

Lancer les migrations : 
```sh
php artisan migrate
```

Puis remplissez la base
```sh
php artisan db:seed
```



Puis lancer le projet : 
```sh
php artisan serve
```

Vous y accéderez sur : http://127.0.0.1:8000/

Vous pourrez ensuite créer un compte, vous serez un simple utilisateur, vous pourrez créer un board.
