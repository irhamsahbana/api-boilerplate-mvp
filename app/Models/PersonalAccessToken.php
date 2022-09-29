<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

use App\Models\Helper\Uuid;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use Uuid;
}
