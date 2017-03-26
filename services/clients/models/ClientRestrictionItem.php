<?php

namespace directapi\services\clients\models;

use directapi\components\Model;

class ClientRestrictionItem extends Model
{
    /**
     * @var \directapi\services\clients\enum\ClientRestrictionEnum
     */
    public $Element;

    /**
     * @var int
     */
    public $Value;

}
