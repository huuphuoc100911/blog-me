<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class AccountStatus extends Enum implements LocalizedEnum
{
    const IN_ACTIVE = 1;
    const ACTIVE = 2;
}
