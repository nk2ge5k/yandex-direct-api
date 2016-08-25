<?php


namespace directapi\services\adimages\criterias;

use directapi\components\Model;

class AdImageSelectionCriteria extends Model
{
    /**
     * @var string[]
     */
    public $AdImageHashes;

    /**
     * @var \directapi\common\enum\YesNoEnum
     */
    public $Associated;
}