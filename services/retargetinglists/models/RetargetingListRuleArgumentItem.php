<?php

namespace directapi\services\retargetinglists\models;

use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class RetargetingListRuleArgumentItem extends Model {
    /**
     * @Assert\Range(min=1, max=90)
     *
     * @var int
     */
    public $MembershipLifeSpan;
    /**
     * @Assert\NotBlank()
     *
     * @var int
     */
    public $ExternalId;
}
