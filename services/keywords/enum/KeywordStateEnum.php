<?php


namespace directapi\services\keywords\enum;


use directapi\components\Enum;

class KeywordStateEnum extends Enum
{
    const OFF = 'OFF';
    const ON = 'ON';
    const SUSPENDED = 'SUSPENDED';
}