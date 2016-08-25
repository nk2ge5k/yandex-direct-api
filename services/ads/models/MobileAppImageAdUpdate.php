<?php


namespace directapi\services\ads\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class MobileAppImageAdUpdate extends Model
{
    /**
     * @var string
     * @Assert\Length(max="1024")
     */
    public $TrackingUrl;
    /**
     * @var string
     */
    public $AdImageHash;
}