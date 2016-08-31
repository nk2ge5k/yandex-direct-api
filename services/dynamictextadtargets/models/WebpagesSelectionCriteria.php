<?php


namespace directapi\services\dynamictextadtargets\models;


use directapi\components\Model;
use directapi\services\dynamictextadtargets\enum\WebpageStateSelectionEnum;

class WebpagesSelectionCriteria extends Model
{
    /**
     * @var array
     */
    public $Ids;
    /**
     * @var array
     */
    public $AdGroupIds;
    /**
     * @var array
     */
    public $CampaignIds;
    /**
     * @var WebpageStateSelectionEnum[]
     */
    public $States;
}