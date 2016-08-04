<?php


namespace directapi\services\keywords\enum;


use directapi\components\Enum;

class KeywordStatusEnum extends Enum
{
    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const REJECTED = 'REJECTED';
}