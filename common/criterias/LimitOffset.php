<?php

namespace directapi\common\criterias;


use directapi\components\Model;

class LimitOffset extends Model
{
    /**
     * @var int
     */
    public $Limit;
    /**
     * @var int
     */
    public $Offset;

    /**
     * @param int $offset
     * @param int $limit
     * @return LimitOffset
     */
    public static function init( $offset = 0, $limit = 1000 ) {
        return new LimitOffset(['Limit' => $limit, 'Offset' => $offset]);
    }
}