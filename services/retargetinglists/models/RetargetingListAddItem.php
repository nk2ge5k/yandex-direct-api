<?php

namespace directapi\services\retargetinglists\models;

use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use directapi\components\constraints AS DirectApiAssert;


class RetargetingListAddItem extends Model {
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     *
     * @var string
     */
    public $Name;
    /**
     * @Assert\Length(max=4096)
     *
     * @var string
     */
    public $Description;
    /**
     * @DirectApiAssert\ArrayOf(type="\directapi\services\reatrgetinglists\models\RetargetingListRuleItem")
     * @Assert\Count(min=1, max=50)
     * @Assert\NotBlank()
     *
     * @var RetargetingListRuleItem[]
     */
    public $Rules;
}
