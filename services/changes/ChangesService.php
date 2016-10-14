<?php

namespace directapi\services\changes;


use directapi\services\BaseService;
use directapi\services\changes\enum\FieldNamesEnum;
use directapi\services\changes\models\CheckCampaignsResponse;
use directapi\services\changes\models\CheckDictionariesResponse;
use directapi\services\changes\models\CheckResponse;

class ChangesService extends BaseService
{
    /**
     * @param string $Timestamp
     *
     * @return CheckDictionariesResponse
     */
    public function checkDictionaries( string $Timestamp = NULL )
    {
        return $this->call(
            'checkDictionaries', 
            $Timestamp !== NULL
                ? [ 'Timestamp' => $Timestamp ]
                : []
        );
    }

    /**
     * @param string $Timestamp
     *
     * @return CheckCampaignsResponse
     */
    public function checkCampaigns( string $Timestamp )
    {
        return $this->call(
            'checkCampaigns',
            [
                'Timestamp' = $Timestamp
            ] 
        );
    }

    /**
     * @param int[]            $CampaignIds
     * @param int[]            $AdGroupIds
     * @param int[]            $AdIds
     * @param FieldNamesEnum[] $FieldNames
     * @param string           $Timestamp
     * @return CheckResponse
     * @throws \Exception
     */
    public function check(
        array $CampaignIds  = [],
        array $AdGroupIds   = [],
        array $AdIds        = [],
        array $FieldNames,
        string $Timestamp
    ) {
        $params = [
            'Timestamp'     => $Timestamp,
            'FieldNames'    => $FieldNames
        ];
        
        if ($CampaignIds) {
            $params['CampaignIds']  = $CampaignIds;
        } elseif ($AdGroupIds) {
            $params['AdGroupIds']   = $AdGroupIds;
        } elseif ($AdIds) {
            $params['AdIds']        = $AdIds;
        } else {
            throw new \InvalidArgumentException(
                'Должен быть указан один из параметров - CampaignIds, AdGroupIds, AdIds'
            );
        }
        
        return $this->call('check', $params);
    }
    
    /**
     * @return string
     */
    protected function getName()
    {
        return 'changes';
    }
}
