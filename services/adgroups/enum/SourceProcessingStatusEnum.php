<?php


namespace directapi\services\adgroups\enum;


use directapi\components\Enum;

class SourceProcessingStatusEnum extends  Enum
{
    const EMPTY_RESULT = 'EMPTY_RESULT';
    const PROCESSED = 'PROCESSED';
    const UNKNOWN = 'UNKNOWN';
    const UNPROCESSED = 'UNPROCESSED';
}