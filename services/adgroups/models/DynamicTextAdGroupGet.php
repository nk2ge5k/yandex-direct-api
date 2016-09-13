<?php

namespace directapi\services\adgroups\models;

use directapi\components\Model;

class DynamicTextAdGroupGet extends Model
{
    
    /**
     * @var string
     */
    public $DomainUrl;

    /**
     * @var \directapi\services\adgroups\enum\DomainUrlProcessingStatusEnum
     */
    public $DomainUrlProcessingStatus;
}