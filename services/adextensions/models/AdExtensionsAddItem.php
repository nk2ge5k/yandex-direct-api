<?php

namespace directapi\services\adextensions\models;

use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AdExtensionsAddItem extends Model implements ICallbackValidation
{
    /**
     * @var Callout
     */
    public $Callout;

    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->Callout) {
            $context->buildViolation('Необходимо указать Callout')
                ->atPath('Callout')
                ->addViolation();
        }
    }
}