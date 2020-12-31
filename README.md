# Todo

## Migrations et relations
Pour la mise en place des migrations et relations voir rendu un

## Utilisateurs non connecté
Il a accès à la page d'accueil, où il peut se connecter s'il est enregistré, ou s'inscrire s'il ne l'est pas.

## Utilisateurs connecté 
Il a accès à la page board (Voir Board), il peut modifier son profil, le supprimer et se déconnecter.

## Catégories
La première étape mise en place dans ce todo a été le CRUD de Catégorie.
En effet c'était le plus facile à faire pour comprendre comment faire un CRUD.
N'importe quel utilisateur connecté peut créer une catégorie, en cliquant dans la barre de navigation, ou s'il a oublié, un bouton permet d'y accèder à la création d'une tâche.
Il y a donc les vues dans un dossier catégory, avec l'index, create, show et edit.
Tout utilisateur connecté peut modifier, supprimer une catégorie

## Boards
Ensuite, je me suis occupée du CRUD de board.
Lorsque que l'on se connecte on peut accéder à la page boards qui affiche seulement tous les boards où l'on est propriétaire et auxquelles on participe, pour cela on a crée un policy.
On peut également sur cette page ajouter un board, et nous serons automatiquement le propriétaire de celui-ci.
Dans le dossier user, il y a un dossier boards avec l'index, create, show et edit.
La policy mise en oeuvre permet également que seul le propriétaire du board puisse supprimer ou modifier le board.

## Board User
Un Board comprend des utilisateurs qui y participent, c'est pour cela que lorsqu'on appuie sur voir un board on peut voir les utilisateurs qui participent au board (il y a également le propriétaire du board qui est rajouté automatiquement).
J'ai eu du mal à faire le CRUD à cause du fait que cela est une table pivot, il a fallut utilisé $user->pivot pour avoir le bon paramètre.
J'ai essayé de mettre en place un policy pour que seul le propriétaire du board puisse ajouter et supprimer un participant mais cela n'a pas marché.
J'ai essayé de faire pour create : 
public function create(User $user, Board $board)
     {
         
         return $user->id ===  $board->user_id;
     }
Sauf que j'avais une erreur qui me disait que je n'avais pas le droit de rajouter un argument à la fonction créer

Et pour le delete : 
public function delete(User $user, Board $board)
    {
        return $user->id ===  $board->user_id;
    }
Mais comme on était dans la policy BoardUser il n'acceptait pas que j'utilise Board, sauf que je ne voyais pas comment faire autrement.

Dans la liste déroulante pour ajouter un participant il n'apparait que ceux qui n'y sont pas déjà.

## Tasks
Toujours dans le voir d'un board on peut accéder aux tâches relatives au board.
Un utilisateur connecté et qui participent aux boards peut en ajouter, modifier supprimer et voir (CRUD)

## Task User
Un utilisateur connecté et qui participent aux boards peut cliquer sur voir une tâche et on peut accéder à la liste des personnes assignés à la tâche. Lorsqu'on veut assigné une personne, dans la liste déroulante s'affiche seulement les personnes qui participent au board. 
Je n'ai pas trouvé comment faire pour que seulement l'utilisateur assigné puissen modifier son status.

## Comments
Toujours dans le voir d'une tâche on a tous les commentaires relié à cette tâche, on peut en ajouter, modifier et supprimer.
J'ai mis en place un policy pour que seul celui qui a écrit le commentaire puisse le modifier ou le supprimer mais cela n'a pas marché, j'avais quand même une restriction alors que j'avais écrit le commentaire.
Je pensais avoir bien compris l'exemple fait en cours, mais en voulant le refaire en suivant le même exemple cela n'a malheureusement pas marché.

## Attachments
J'ai essayé de suivre de tutos sur internet, et lu beaucoup de docs, je n'ai pas réussis à mettre en place le CRUD des attachments


## Navigation
J'ai eu et j'ai encore un problème sur la barre de navigation.
En effet j'ai mis de temps à comprendre comment l'intégrer dans mes pages alors qu'elle y était dans la page dashboard mais je ne trouvais pas comment, alors j'ai rajouté le layouts.app mais cela n'utilisait pas les mêmes styles que moi alors cela n'avait pas bien marché comme je voulais.
Puis j'ai trouvé : @livewire('navigation-dropdown'), cela avait l'air de fonctionné, mais quand je clique sur mon nom, il n'apparait pas mon profil et pour se déconnecter.
Je n'ai pas compris pourquoi, alors j'ai ensuite essayé de copier ce qu'il y avait dans navigation-dropdown, mais même problème.
Alors désolé pour se déconnecter il faut aller dans dashboard ou profile !