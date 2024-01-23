<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{

    public function update(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $idea->user_id === $user->id);
    }


    public function delete(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $idea->user_id === $user->id);

    }

}
