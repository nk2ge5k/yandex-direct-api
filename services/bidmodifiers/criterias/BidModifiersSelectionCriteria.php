<?php

namespace directapi\services\bidmodifiers\criterias;


use directapi\components\constraints as DirectApiAssert;
use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class BidModifiersSelectionCriteria extends Model implements ICallbackValidation
{
    public $CampaignIds;

    public $AdGroupIds;

    public $Ids;

    public $Types;

    public $Levels;

    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->CampaignIds && !$this->AdGroupIds && !$this->Ids) {
            $context->buildViolation('Необходимо указать одно из значений: CampaignIds, AdGroupId, Ids')
                ->atPath('CampaignIds')
                ->atPath('AdGroupId')
                ->atPath('Ids')
                ->addViolation();
        }
    }
}