<?php

namespace directapi\services\ads\models;

use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AdAddItem extends Model implements ICallbackValidation
{
    /**
     * @var int
     * @Assert\NotBlank()
     */
    public $AdGroupId;

    /**
     * @Assert\Valid()
     * @var TextAdAdd
     */
    public $TextAd;

    /**
     * @Assert\Valid()
     * @var MobileAppAdAdd
     */
    public $MobileAppAd;

    /**
     * @Assert\Valid()
     * @var DynamicTextAdAdd
     */
    public $DynamicTextAd;

    /**
     * @Assert\Valid()
     * @var TextAdAdd
     */
    public $TextImageAd;

    /**
     * @Assert\Valid()
     * @var MobileAppImageAdAdd
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