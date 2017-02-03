# yandex-direct-api

[Offical yandex direct API documentation](https://tech.yandex.ru/direct/doc/dg/concepts/about-docpage/?ncrnd=6456)

## Installation

```
composer require nk2ge5k/yandex-direct-api
```

## Usage

```php
use directapi/DirectApiService;
use directapi/services/campaigns/criterias/CampaignsSelectionCriteria;
use directapi/services/campaigns/enum/CampaignStateEnum;
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
