<?php namespace App\Marx\Repositories;

use App\Marx\Repositories\Contracts\UserRepository;
use App\User;
use Illuminate\Support\Collection;

class EloquentUserRepository implements UserRepository
{

    /**
     * @var
     */
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function all()
    {


        $users = new Collection;

        return $users;
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }


}