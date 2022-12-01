<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class MediaType extends Enum implements LocalizedEnum
{
    const IMAGE = 1;
    const VIDEO = 2;
    const AUDIO = 3;
}
