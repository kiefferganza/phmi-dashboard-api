<?php

namespace App;
use Laravel\Sanctum\PersonalAccessToken;

class SanctumPersonalAccessClient extends PersonalAccessToken
{
    protected $connection = 'sqlsrv_auth';
    protected $table = 'personal_access_tokens';
}
