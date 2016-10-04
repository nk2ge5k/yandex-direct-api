<?php

namespace directapi\services\audiencetargets\enum;

use directapi\components\Enum; 

class AudienceTargetFieldEnum extends Enum {
    const Id = 'Id';
    const AdGroupId = 'AdGroupId';
    const CampaignId = 'CampaignId';
    const RetargetingListId = 'RetargetingListId';
    const ContextBid = 'ContextBid';
    const StrategyPriority = 'StrategyPriority';
    const State = 'State';
}
