<?php


namespace directapi\dynamictextadtargets\models;


use directapi\components\Model;
use directapi\dynamictextadtargets\enum\WebpageStateSelectionEnum;

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