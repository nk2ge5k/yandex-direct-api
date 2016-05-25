<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 16.05.2016
 * Time: 17:55
 */

namespace directapi\services\ads\models;

use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AdExtensionSetting extends Model implements ICallbackValidation
{
    /**
     * @var AdExtensionSettingItem[]
     */
    public $AdExtensions;

    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->AdExtensions) {
            $context->buildViolation('Необходимо указать массив AdExtensions')
                ->atPath('AdExtensions')
                ->addViolation();
        }
    }
}