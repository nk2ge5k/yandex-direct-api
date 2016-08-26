<?php


namespace directapi\services\clients;


use directapi\services\BaseService;

class ClientsService extends BaseService
{
    const SERVICE = 'Clients';

    protected function getName()
    {
        return strtolower(self::SERVICE);
    }

    public function get( array $fieldNames ) {
        $params = [
            'FieldNames'        => $fieldNames,
        ];

        return parent::doGet($params, self::SERVICE, null);
    }
}