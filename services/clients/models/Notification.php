<?php

namespace directapi\services\clients\models;

use directapi\components\Model;

class Notification extends Model
{
    /**
     * @var \directapi\common\enum\LangEnum
     */
    public $Lang;

    /**
     * @var string
     */
    public $SmsPhoneNumber;

    /**
     * @var string
     */
    public $Email;

    /**
     * @var array //@TODO EmailSubscriptions
     */
    public $EmailSubscriptions;
}
