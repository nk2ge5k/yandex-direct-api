# yandex-direct-api

## Installation

```
composer require nk2ge5k/yandex-direct-api
```

## Usage

```php
use directapi/DirectApiService;
use directapi/services/campaigns/criterias/CampaignsSelectionCriteria;
use directapi/services/campaigns/criterias/CampaignStateEnum;
use directapi/services/campaigns/enum/CampaignFieldEnum;

$token = YOUR_TOKEN;
$login = CLIENT_LOGIN;

$client = new DirectApiService($token, $login);

$campaigns = $client
    ->getCampaignsService()
    ->get(
        new CampaignsSelectionCriteria(
            [   
                'States' => [
                    CampaignStateEnum::ON
                ]   
            ]   
        ),  
        CampaignFieldEnum::getValues()
    );  

foreach ( $campaigns as $campaign ) { 
    // do something
}
```
