<?php

namespace directapi\services\adextensions\enum;

use directapi\components\Enum;

class AdExtensionStatusEnum extends Enum
{
    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const REJECTED = 'REJECTED';
}