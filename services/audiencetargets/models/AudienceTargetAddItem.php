<?php

namespace directapi\services\audiencetargets\models;

use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class AudienceTargetAddItem extends Model {
    
    /**
     * @Assert\NotBlank()
     *
     * @var int
     */
    public $AdGroupId;
    
    /**
     * @Assert\NotBlank()
     *
     * @var int
     */
    public $RetargetingListId;

    /**
     * @var int
     */
    public $ContextBid;

    /**
     * @var
     */
    public $StrategyPriority;
} 
