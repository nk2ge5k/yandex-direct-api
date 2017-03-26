<?php

namespace directapi\services\clients\models;

use directapi\components\Model;

class ClientSettingItemGet extends Model
{
    /**
     * @var \directapi\services\clients\enum\ClientSettingGetEnum
     */
    public $Option;
    /**
     * @var \directapi\common\enum\YesNoEnum
     */
    public $Value;
}
