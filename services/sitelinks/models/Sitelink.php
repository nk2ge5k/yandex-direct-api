<?php

namespace directapi\services\sitelinks\models;

use directapi\components\constraints as DirectApiAssert;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class Sitelink extends Model
{
    /**
     * @var string
     */
    public $Title;

    /**
     * @var string
     */
    public $Href;

    /**
     * @var string
     */
    public $Description;
}