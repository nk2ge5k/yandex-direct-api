<?php


namespace directapi\services\dynamictextadtargets\enum;


use directapi\components\Enum;

class WebpageConditionOperandEnum extends Enum
{
    const DOMAIN = 'DOMAIN';
    const OFFERS_LIST_URL = 'OFFERS_LIST_URL';
    const PAGE_CONTENT = 'PAGE_CONTENT';
    const PAGE_TITLE = 'PAGE_TITLE';
    const URL = 'URL';
}