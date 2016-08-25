<?php


namespace directapi\services\ads\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class TextImageAdAdd extends Model
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="1024")
     */
    public $Href;
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    public $AdImageHash;
}