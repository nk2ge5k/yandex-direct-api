<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 16.05.2016
 * Time: 18:00
 */

namespace directapi\services\ads\enum;


use directapi\components\Enum;

class AdExtensionSettingOperationEnum extends Enum
{
    const ADD = 'ADD';
    const REMOVE = 'REMOVE';
    const SET = 'SET';
}