<?php

namespace directapi\services\audiencetargets\models;

use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


class SetBidsItem extends Model implements ICallbackValidation {

    /**
     * @var int
     */
    public $Id;
    
    /**
     * @var int
     */
    public $AdGroupId;
    
    /**
     * @var int
     */
    public $CampaignId;
    
    /**
     * @var int
     */
    public $ContextBid;
    
    /**
     * @var \directapi\common\enum\PriorityEnum
     * @DirectApiAssert\IsEnum(type="directapi\common\enum\PriorityEnum")
     */
    public $StrategyPriority; 
    
    /**
     * @Assert\Callback()
     * @param ExecutionContextInterface $context
     */
    public function isValid( ExecutionContextInterface $context ) {
        if (
                !$this->Id
            and !$this->AdGroupId
            and !$this->CampaignId
        ) {
            $context
                ->buildViolation(
                    'Необходимо указать Id либо AdGroupId либо CampaignId'
                )
                ->atPath('Id')
                ->atPath('AdGroupId')
                ->atPath('CampaignId');
        }
    
    }
}
