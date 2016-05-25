<?php

namespace directapi\services\bids\criterias;


use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class BidsSelectionCriteria extends Model implements ICallbackValidation
{
    /**
     * @var int[]
     */
    public $KeywordIds;

    /**
     * @var int[]
     */
    public $AdGroupIds;

    /**
     * @var int[]
     */
    public $CampaignIds;

    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->CampaignIds && !$this->AdGroupIds && !$this->KeywordIds) {
            $context->buildViolation('Должно быть указано одно из следующих значений: CampaignIds, AdGroupIds, KeywordIds')
                ->atPath('CampaignIds')
                ->atPath('AdGroupIds')
                ->atPath('KeywordIds')
                ->addViolation();
        }
    }
}