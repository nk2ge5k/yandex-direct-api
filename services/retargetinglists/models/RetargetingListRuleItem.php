<?php

namespace directapi\services\retargetinglists\models;

use directapi\components\Model;
use directapi\services\retargetinglists\enum\RetargetingListRuleOperatorEnum;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use directapi\components\constraints AS DirectApiAssert;

class RetargetingListRuleItem extends Model {
    
    /**
     * @Assert\Count(min=1, max=250)
     * @Assert\NotBlank()
     * @DirectApiAssert\ArrayOf(type="\directapi\services\retargetinglists\models\RetargetingListRuleArgumentItem")
     *
     * @var RetargetingListRuleArgumentItem[]
     */
    public $Arguments;
    /**
     * @Assert\NotBlank()
     *
     * @var RetargetingListRuleOperatorEnum
     */
    public $Operator;
}
