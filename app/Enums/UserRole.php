<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class UserRole extends Enum implements LocalizedEnum
{
    const ADMIN = 1;
    const STAFF = 2;
    const USER = 3;
    const CUSTOMER = 4;
}
