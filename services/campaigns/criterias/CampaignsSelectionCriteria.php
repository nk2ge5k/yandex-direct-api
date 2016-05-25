<?php
namespace directapi\services\campaigns\criterias;

use directapi\components\constraints as DirectApiAssert;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class CampaignsSelectionCriteria extends Model
{
    public $Ids;

    public $Types;

    public $States;

    public $Statuses;

    public $StatusesPayment;
}