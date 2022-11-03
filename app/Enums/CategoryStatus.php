<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class CategoryStatus extends Enum implements LocalizedEnum
{
    const INACTIVE = 1;
    const ACTIVE = 2;
}
