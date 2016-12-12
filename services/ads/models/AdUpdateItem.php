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
     * @var DynamicTextAdUpdate|null
     */
    public $DynamicTextAd;

    /**
     * @Assert\Valid()
     * @var TextAdUpdate
     */
    public $TextImageAd;

    /**
     * @Assert\Valid()
     * @var MobileAppImageAdUpdate
     */
    public $MobileAppImageAd;

    /**
     * @Assert\Callback()
     * @param ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if (
            !$this->TextAd &&
            !$this->MobileAppAd &&
            !$this->DynamicTextAd &&
            !$this->TextImageAd &&
            !$this->MobileAppImageAd
        ) {
            $context->buildViolation(
                'Необходимо указать TextAd либо MobileAppAd либо DynamicTextAd либо TextImageAd либо MobileAppImageAd'
            )
                ->atPath('TextAd')
                ->atPath('MobileAppAd')
                ->atPath('DynamicTextAd')
                ->atPath('TextImageAd')
                ->atPath('$MobileAppImageAd')
                ->addViolation();
        }
    }
}
