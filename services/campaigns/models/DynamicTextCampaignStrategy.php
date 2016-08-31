<?php


namespace directapi\services\campaigns\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class DynamicTextCampaignStrategy extends  Model
{
    /**
     * @var \directapi\services\campaigns\models\strategies\DynamicTextCampaignSearchStrategy
     * @Assert\NotBlank()
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\DynamicTextCampaignSearchStrategy")
     */
    public $Search;

    /**
     * @var \directapi\services\campaigns\models\strategies\DynamicTextCampaignNetworkStrategy
     * @Assert\NotBlank()
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\DynamicTextCampaignNetworkStrategy")
     */
    public $Network;
}