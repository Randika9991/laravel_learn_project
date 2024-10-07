<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function edit(User $user, Job $job): bool
    {
        // Allow the employer to edit the job
        if ($job->employer->user->is($user)) {
            return true;
        }

        // Optionally allow admins to edit any job
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }
}
