<?php

namespace App\Policies;

use App\Models\Board;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

/**
 * Policy pour le Board
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class BoardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // On renforce si jamais il n'est pas connecté
        //return true;
        //ou
        return Auth::user()->id == $user->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Board  $board
     * @return mixed
     */
    public function view(User $user, Board $board)
    {
        // 
        // La règle est qu'un utilisateur doit être participant du board pour le voir
        return $board                   // La board à voir
                    ->users             // les utilisateurs qui participent à la board
                    ->find($user->id)   // On cherche dans les participants l'utilisateur qui effectue l'action
                    !== null;           // Si on obtient un résultat différent de null, c'est que l'on y a trouvé l'utilisateur
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return Auth::user()->id == $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Board  $board
     * @return mixed
     */
    public function update(User $user, Board $board)
    {
        //
        return $user->id ===  $board->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Board  $board
     * @return mixed
     */
    public function delete(User $user, Board $board)
    {
        //
        return $user->id ===  $board->user_id;
    }

}
