<?php

namespace App\Policies;

use App\Models\BoardUser;
use App\Models\User;
use App\Models\Board;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoardUserPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoardUser  $boardUser
     * @return mixed
     */
    public function view(User $user, BoardUser $boardUser)
    {
        //
    }

    // /**
    //  * Determine whether the user can create models.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return mixed
    //  */
    // public function create(User $user, Board $board)
    // {
    //     //
    //     return $user->id ===  $board->user_id;
    // }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoardUser  $boardUser
     * @return mixed
     */
    public function update(User $user, BoardUser $boardUser)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoardUser  $boardUser
     * @return mixed
     */
    public function delete(User $user, Board $board)
    {
        return $user->id ===  $board->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoardUser  $boardUser
     * @return mixed
     */
    public function restore(User $user, BoardUser $boardUser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BoardUser  $boardUser
     * @return mixed
     */
    public function forceDelete(User $user, BoardUser $boardUser)
    {
        //
    }
}
