<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    protected $modelClass = User::class;
}
