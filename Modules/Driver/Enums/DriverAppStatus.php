<?php

namespace Modules\Driver\Enums;

use BenSampo\Enum\Enum;

final class DriverAppStatus extends Enum {

    const pending = 'pending';
    const reviewed ='reviewed';
    const approved='approved';
    const suspended='suspended';
}