<?php namespace App\Marx\Repositories\Contracts;

interface UserRepository
{
    public function all();

    public function find($id);

}