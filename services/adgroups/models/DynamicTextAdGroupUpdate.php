<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 25.05.2016
 * Time: 18:50
 */

namespace directapi\services\adgroups\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class DynamicTextAdGroupUpdate extends Model
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $DomainUrl;
}