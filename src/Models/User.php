<?php

namespace App\Models;

use PikaJew002\Handrolled\Database\ORM\Entity;

class User extends Entity
{
    protected string $tableName = 'users';

    // Entity database columns
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $created_at;
    public $updated_at;

    /*
     * -> must implement in every class that extends Entity
     */
    public static function getTableName(): string
    {
        return $tableName ?? "users";
    }
}
