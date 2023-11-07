<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Access\Response;

class StudentPolicy
{
    

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_admin === Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->is_admin === Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->is_admin === Role::IS_ADMIN;
    }

   
}