<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 25.05.2016
 * Time: 18:59
 */

namespace directapi\services\adgroups\enum;


use directapi\components\Enum;

class DomainUrlProcessingStatusEnum extends Enum
{
    const UNPROCESSED = 'UNPROCESSED';
    const PROCESSED = 'PROCESSED';
    const EMPTY_RESULT = 'EMPTY_RESULT';
}