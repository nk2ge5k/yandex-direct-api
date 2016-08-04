<?php

namespace directapi\services\ads\enum;


use directapi\components\Enum;

class AdStateEnum extends Enum
{
    const OFF = 'OFF';
    const ON = 'ON';
    const SUSPENDED = 'SUSPENDED';
    const OFF_BY_MONITORING = 'OFF_BY_MONITORING';
    const ARCHIVED = 'ARCHIVED';
}