<?php

namespace App\Repos;

use App\Models\User;
use Exception;

class UserRepo
{
    protected $user;
    protected $walletRepo;

    public function __construct(User $user, WalletRepo $walletRepo)
    {
        $this->user = $user;
        $this->walletRepo = $walletRepo;
    }

    public function getUserWithRelation(int $id, string $relation): User
    {
        return $this->user->with($relation)->findOrFail($id);
    }

    public function registerUser(array $userData): User
    {
        $this->user->name = $userData['name'];
        $this->user->email = $userData['email'];
        $this->user->password = $userData['password'];

        $this->user->save();

        $this->walletRepo->createNewWallet($this->user);

        return $this->user;
    }

    public function clearRememberToken(string $email): void
    {
        $user = $this->user->where('email', $email)->first();
        $user->remember_token = null;
        $user->save();
    }

    public function getConsumerNameByID(int $id): string
    {
        $user = $this->user->findOrFail($id);

        if (!$user) {
            throw new Exception("There's no such user");
        }

        return $user->name;
    }
}