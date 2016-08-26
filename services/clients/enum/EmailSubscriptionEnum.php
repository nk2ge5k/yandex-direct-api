<?php


namespace directapi\services\clients\enum;


use directapi\components\Enum;

class EmailSubscriptionEnum extends Enum
{
    const RECEIVE_RECOMMENDATIONS = 'RECEIVE_RECOMMENDATIONS';
    const TRACK_MANAGED_CAMPAIGNS = 'TRACK_MANAGED_CAMPAIGNS';
    const TRACK_POSITION_CHANGES = 'TRACK_POSITION_CHANGES';
}