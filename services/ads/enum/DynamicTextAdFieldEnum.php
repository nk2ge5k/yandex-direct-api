<?php

namespace directapi\services\ads\enum;

use directapi\components\Enum;

class DynamicTextAdFieldEnum extends Enum
{
    const Text = 'Text';
    const VCardId = 'VCardId';
    const VCardModeration = 'VCardModeration';
    const SitelinkSetId = 'SitelinkSetId';
    const SitelinksModeration = 'SitelinksModeration';
    const AdImageHash = 'AdImageHash';
    const AdImageModeration = 'AdImageModeration';
    const AdExtensions = 'AdExtensions';
}