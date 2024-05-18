<?php

namespace App\Models;

use PikaJew002\Handrolled\Database\Orm\Entity;
use PikaJew002\Handrolled\Interfaces\User as UserInterface;
use PikaJew002\Handrolled\Database\Orm\Traits\HasToken;

class User extends Entity implements UserInterface
{
    use HasToken;

    protected string $tableName = 'users';
    protected $primaryKey = 'id';

    // Entity database columns
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $password_hash;
    public $created_at;
    public $updated_at;

    public function getUsername()
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }

    public function tokens(): array
    {
        return $this->hasMany(Token::class, 'user_id');
    }
}
