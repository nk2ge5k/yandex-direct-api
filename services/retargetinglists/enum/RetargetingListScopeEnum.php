<?php

namespace directapi\services\retargeinglists\enum;

use directapi\components\Enum;

class RetargetingListScopeEnum extends Enum {
    const FOR_TARGETS_AND_ADJUSTMENTS = 'FOR_TARGETS_AND_ADJUSTMENTS';
    const FOR_ADJUSTMENTS_ONLY = 'FOR_ADJUSTMENTS_ONLY';
}
