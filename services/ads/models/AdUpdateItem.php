<?php

namespace directapi\services\ads\models;

use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AdUpdateItem extends Model implements ICallbackValidation
{
    /**
     * @var int
     * @Assert\NotBlank()
     */
    public $Id;

    /**
     * @var TextAdUpdate|null
     * @Assert\Valid()
     */
    public $TextAd;

    /**
     * @var MobileAppAdUpdate|null
     * @Assert\Valid()
     */
    public $MobileAppAd;

    /**
     * @Assert\Valid()
     * @var DynamicTextAdAdd|null
     */
    public $DynamicTextAd;

    /**
     * @Assert\Callback()
     * @param ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->TextAd && !$this->MobileAppAd && !$this->DynamicTextAd) {
            $context->buildViolation('Необходимо указать TextAd либо MobileAppAd либо DynamicTextAd')
                ->atPath('TextAd')
                ->atPath('MobileAppAd')
                ->atPath('DynamicTextAd')
                ->addViolation();
        }
    }
}