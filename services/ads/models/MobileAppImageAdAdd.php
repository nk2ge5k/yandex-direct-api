<?php


namespace directapi\services\ads\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class MobileAppImageAdAdd extends Model
{
    /**
     * @var string
     * @Assert\Length(max="1024")
     */
    public $TrackingUrl;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $AdImageHash;
}