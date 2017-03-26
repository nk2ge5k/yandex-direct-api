<?php

namespace directapi\services\agencyclients\criterias;

use directapi\components\Model;

final class AgencyClientsSelectionCriteria extends Model
{
    /**
     * @var \directapi\services\clients\enum\ClientFieldEnum[]
     */
    public $Logins = [];
    
    /**
     * @var \directapi\common\enum\YesNoEnum[]
     */
    public $Archived = NULL;
}
