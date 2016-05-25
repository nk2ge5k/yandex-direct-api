<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 16.05.2016
 * Time: 17:58
 */

namespace directapi\services\ads\models;


use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AdExtensionSettingItem extends Model implements ICallbackValidation
{

    /**
     * @var int
     */
    public $AdExtensionId;

    /**
     * @var \directapi\services\ads\enum\AdExtensionSettingOperationEnum
     * @DirectApiAssert\IsEnum(type="directapi\services\ads\enum\AdExtensionSettingOperationEnum")
     */
    public $Operation;

    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->AdExtensionId || !$this->Operation) {
            $context->buildViolation('Необходимо указать AdExtensionId и Operation')
                ->atPath('AdExtensionId')
                ->atPath('Operation')
                ->addViolation();
        }
    }
}