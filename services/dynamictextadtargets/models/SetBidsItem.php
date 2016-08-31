<?php


namespace directapi\services\dynamictextadtargets\models;


use directapi\components\constraints\IsEnum;
use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class SetBidsItem extends Model implements ICallbackValidation
{
    /**
     * @var integer
     */
    public $CampaignId;
    /**
     * @var integer
     */
    public $AdGroupId;
    /**
     * @var integer
     */
    public $Id;
    /**
     * @var integer
     */
    public $Bid;
    /**
     * @var integer
     */
    public $ContextBid;
    /**
     * @var \directapi\common\enum\PriorityEnum
     *
     * @IsEnum(type="directapi\common\enum\PriorityEnum")
     */
    public $StrategyPriority;

    /**
     * @param ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if ( !$this->CampaignId and !$this->AdGroupId and !$this->Id ) {
            $context->buildViolation(
                'Необходимо указать CampaignId либо AdGroupId либо Id'
            )
                ->atPath('CampaignId')
                ->atPath('AdGroupId')
                ->atPath('Id')
                ->addViolation();
        }

        if ( !$this->Bid and !$this->StrategyPriority ) {
            $context->buildViolation(
                'Необходимо указать Bid либо StrategyPriority'
            )
                ->atPath('Bid')
                ->atPath('StrategyPriority')
                ->addViolation();
        }
    }

}