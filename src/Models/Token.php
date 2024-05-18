<?php

namespace App\Models;

use DateTime;
use PikaJew002\Handrolled\Database\Orm\Entity;
use PikaJew002\Handrolled\Interfaces\Token as TokenInterface;

class Token extends Entity implements TokenInterface
{
    protected string $tableName = 'tokens';

    // Entity database columns
    public $id;
    public $user_id;
    public $token;
    public $expires_at;
    public $created_at;
    public $updated_at;

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function user(): ?User
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getExpiresAt(): DateTime
    {
        return new DateTime($this->expires_at);
    }

    public function isValid(string $datetimestr = 'now'): bool
    {
        $datetime = new DateTime($datetimestr);
        $diff = $datetime->diff($this->getExpiresAt());

        return $diff->invert === 1;
    }
}
