<?php

namespace directapi\common\criterias;

use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class IdsCriteria extends Model
{
    /**
     * @var int[]
     */
    public $Ids;
}