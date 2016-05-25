<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 16.05.2016
 * Time: 17:11
 */

namespace directapi\services\adextensions\models;

use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Callout extends Model implements ICallbackValidation
{
    /**
     * @var string
     */
    public $CalloutText;

    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->CalloutText || $this->CalloutText == '') {
            $context->buildViolation('Необходимо указать текст Callout')
                ->atPath('CalloutText')
                ->addViolation();
        }
    }
}