<?php

namespace directapi\services\adgroups\enum;


use directapi\components\Enum;

class AdGroupStatusEnum extends Enum
{
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const PREACCEPTED = 'PREACCEPTED';
    const ACCEPTED = 'ACCEPTED';//PREACCEPTED
    const REJECTED = 'REJECTED';
    const ARCHIVED = 'ARCHIVED';
    const SUSPENDED = 'SUSPENDED';
    const ALL = 'all';
}
