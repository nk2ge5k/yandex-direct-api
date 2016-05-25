<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 25.05.2016
 * Time: 18:57
 */

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