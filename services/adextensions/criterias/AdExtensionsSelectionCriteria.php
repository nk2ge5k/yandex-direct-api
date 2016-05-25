<?php

namespace directapi\services\adextensions\criterias;


use directapi\components\constraints as DirectApiAssert;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class AdExtensionsSelectionCriteria extends Model
{
    /**
     * @var int[]
     */
    public $Ids;

    /**
     * @var \directapi\services\adextensions\enum\AdExtensionTypeEnum[]
     */
    public $Types;

    /**
     * @var \directapi\services\adextensions\enum\AdExtensionStateEnum[]
     */
    public $States;

    /**
     * @var \directapi\services\adextensions\enum\AdExtensionStatusEnum[]
     */
    public $Statuses;

    /**
     * @var string
     */
    public $ModifiedSince;
}