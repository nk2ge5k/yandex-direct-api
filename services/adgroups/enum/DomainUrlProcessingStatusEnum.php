<?php

namespace directapi\services\adgroups\enum;


use directapi\components\Enum;

class DomainUrlProcessingStatusEnum extends Enum
{
    const UNPROCESSED = 'UNPROCESSED';
    const PROCESSED = 'PROCESSED';
    const EMPTY_RESULT = 'EMPTY_RESULT';
}