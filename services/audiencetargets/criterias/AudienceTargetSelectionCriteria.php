<?php

namespace directapi\services\audiencetargets\criterias;

use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AudienceTargetSelectionCriteria extends Model implements ICallbackValidation  {
    
    /**
     * @var int[]
     */ 
    public $Ids;
    
    /**
     * @var int[]
     */
    public $AdGroupIds;
    
    /**
     * @var int[]
     */
    public $CampaignIds;
    
    /**
     * @var int[]
     */
    public $RetargetingListIds;

    /**
     * @var AudienceTargetStateEnum[]
     */
    public $States;

    /**
     * @Assert\Callback()
     * @param ExecutionContextInterface $context
     */
    public function isValid ( ExecutionContextInterface $context ) {
        if (
                !$this->Ids
            and !$this->AdGroupIds
            and !$this->CampaignIds
            and !$this->RetargetingListIds
        ) {
            $context
                ->buildViolation(
                    'Необходимо указать Ids либо AdGroupIds либо CampaignIds либо RetargetingListIds' 
                )
                ->atPath('Ids')
                ->atPath('AdGroupIds')
                ->atPath('CampaignIds')
                ->atPath('RetargetingListIds');
        }
    }
}
