<?php


namespace directapi\services\ads\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class TextImageAdUpdate extends Model
{
    /**
     * @var string
     * @Assert\Length(max="1024")
     */
    public $Href;
    /**
     * @var string
     */
    public $AdImageHash;
}