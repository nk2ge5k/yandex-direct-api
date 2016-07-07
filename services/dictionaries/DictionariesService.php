<?php


namespace directapi\services\dictionaries;


use directapi\services\BaseService;
use directapi\services\dictionaries\enum\DictionaryNamesEnum;


class DictionariesService extends BaseService
{
    const SERVICE = 'Dictionaries';

    /**
     * @param DictionaryNamesEnum[] $dictionaryNames
     * @return array
     */
    public function get( array $dictionaryNames ) {
        return parent::call('get', ['DictionaryNames' => $dictionaryNames]);
    }
    
    public function getName()
    {
        return strtolower(self::SERVICE);
    }
}