<?php

namespace App\Models;

use PikaJew002\Handrolled\Database\Orm\Entity;
use PikaJew002\Handrolled\Interfaces\User as UserInterface;
use PikaJew002\Handrolled\Traits\Edibles;

class User extends Entity implements UserInterface
{
    use Edibles;

    protected string $tableName = 'users';

    // Entity database columns
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $password_hash;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getPasswordHash()
    {
        return $this->password_hash;
    }

    public static function checkCredentials(string $username, string $password): ?self
    {
        $user = self::find([
            'conditions' => ['email' => $username],
        ]);
        if(!empty($user) && password_verify($password, $user[0]->getPasswordHash())) {
            return $user[0];
        }

        return null;
    }

    /*
     * -> must implement in every class that extends Entity
     */
    public static function getTableName(): string
    {
        return $tableName ?? "users";
    }
}
