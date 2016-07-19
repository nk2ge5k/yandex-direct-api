<?php

namespace directapi\services\ads\enum;


use directapi\components\Enum;

class TextAdFieldEnum extends Enum
{
    const Title = 'Title';
    const Text = 'Text';
    const Href = 'Href';
    const Mobile = 'Mobile';
    const DisplayDomain = 'DisplayDomain';
    const DisplayUrlPath = 'DisplayUrlPath';
    const DisplayUrlPathModeration = 'DisplayUrlPathModeration';
    const VCardId = 'VCardId';
    const VCardModeration = 'VCardModeration';
    const SitelinkSetId = 'SitelinkSetId';
    const SitelinksModeration = 'SitelinksModeration';
    const AdImageHash = 'AdImageHash';
    const AdImageModeration = 'AdImageModeration';
    const AdExtensions = 'AdExtensions';
}