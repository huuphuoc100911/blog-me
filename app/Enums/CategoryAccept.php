<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class CategoryAccept extends Enum implements LocalizedEnum
{
    const INACCEPT = 1;
    const ACCEPT = 2;
}
