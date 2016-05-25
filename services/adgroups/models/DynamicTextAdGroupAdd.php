<?php
/**
 * Created by PhpStorm.
 * User: d.kuznetsov
 * Date: 25.05.2016
 * Time: 19:02
 */

namespace directapi\services\adgroups\models;


use directapi\components\Model;

class DynamicTextAdGroupAdd extends Model
{

    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $DomainUrl;
}