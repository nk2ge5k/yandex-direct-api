<?php

namespace directapi\services\retargetinglists\models;

use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use directapi\components\constraints AS DirectApiAssert;


class RetargetingListUpdateItem extends Model {
    
    /**
     * @Assert\NotBlanck()
     * 
     * @var int
     */
    public $Id;
    /**
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
     * @Assert\Count(max=50)
     *
     * @var RetargetingListRuleItem[]
     */
    public $Rules;
}
