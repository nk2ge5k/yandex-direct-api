<?php

namespace directapi;

use directapi\exceptions\DirectApiCurlException;
use directapi\exceptions\DirectApiException;
use directapi\exceptions\DirectApiNullException;
use directapi\exceptions\RequestValidationException;
use directapi\services\adextensions\AdExtensionsService;
use directapi\services\adgroups\AdGroupsService;
use directapi\services\adimages\AdImagesService;
use directapi\services\ads\AdsService;
use directapi\services\bidmodifiers\BidModifiersService;
use directapi\services\bids\BidsService;
use directapi\services\campaigns\CampaignsService;
use directapi\services\changes\ChangesService;
use directapi\services\clients\ClientsService;
use directapi\services\dictionaries\DictionariesService;
use directapi\services\keywords\KeywordsService;
use directapi\services\sitelinks\SitelinksService;
use directapi\services\vcards\VCardsService;
use directapi\services\dynamictextadtargets\DynamicTextAdTargetsService;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Cache\FilesystemCache;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Mapping\Cache\CacheInterface;
use Symfony\Component\Validator\Mapping\Cache\DoctrineCache;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DirectApiService
{
    const NULL = "NULL";

    private $token;
    private $clientLogin;
    private $apiUrl         = 'https://api.direct.yandex.com/json/v5/';
    private $sandboxUrl     = 'https://api-sandbox.direct.yandex.com/json/v5/';
    private $sandbox        = FALSE;

    public $units = 0;
    public $lastCallCost = 0;
    public $unitsLimit = 0;

    /**
     * @var AdGroupsService
     */
    private $adGroupsService;

    /**
     * @var AdsService
     */
    private $adsService;

    /**
     * @var BidModifiersService
     */
    private $bidModifiersService;

    /**
     * @var BidsService
     */
    private $bidsService;

    /**
     * @var CampaignsService
     */
    private $campaignsService;

    /**
     * @var ChangesService
     */
    private $changesService;

    /**
     * @var KeywordsService
     */
    private $keywordsService;

    /**
     * @var SitelinksService
     */
    private $sitelinksService;

    /**
     * @var VCardsService
     */
    private $vcardsService;

    /**
     * @var AdExtensionsService
     */
    private $adExtensionsService;
    /**
     * @var DictionariesService
     */
    private $dictionariesService;
    /**
     * @var AdImagesService
     */
    private $adImagesService;
    /**
     * @var ClientsService
     */
    private $clientsService;
    /**
     * @var DynamicTextAdTargetsService
     */
    private $dynamicTextAdTargetsService;
    /**
     * @var CacheInterface
     */
    protected $annotationCache;
    /**
     * @var bool
     */
    protected $useOperatorPoints = NULL;

    /**
     * DirectApiService constructor.
     * @param $token
     * @param null $clientLogin
     * @param CacheInterface|null $annotation_cache
     */
    public function __construct($token = null, $clientLogin = null, CacheInterface $annotation_cache = null) {
        AnnotationRegistry::registerLoader('class_exists');

        $this->annotationCache = $annotation_cache !== null ?
            $annotation_cache : new FilesystemCache(__DIR__ . '/cache');

        if ( $token !== NULL ) {
            $this->token = $token;
        }

        if ( $clientLogin !== NULL ) {
            $this->clientLogin = $clientLogin;
        }

    }

    /**
     * @param bool $sandbox
     * @return $this
     */
    public function setSandbox ( $sandbox = TRUE ) {
        if ( !is_bool($sandbox) ) {
            throw new \InvalidArgumentException('Argument must be type of bool, ' . gettype($sandbox) . ' given');
        }

        $this->sandbox = $sandbox;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSandbox() {
        return $this->sandbox;
    }

    /**
     * @param bool $use
     * @return $this
     */
    public function useOperatorPoints( $use ) {
        if ( !is_bool($use) ) {
            throw new \InvalidArgumentException('Argument must be type of bool, ' . gettype($use) . ' given');
        }

        $this->useOperatorPoints = $use;

        return $this;
    }

    /**
     * @return bool
     */
    public function isUsingOperatorPoints() {
        return (bool) $this->useOperatorPoints;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken ( $token ) {
        if ( !is_string($token) and $token !== NULL ) {
            throw new \InvalidArgumentException(
                'Token must be type of string or NULL, ' . gettype($token) . ' given'
            );
        }

        $this->token = $token;

        return $this;
    }

    /**
     * @param string $clientLogin
     * @return $this
     */
    public function setClientLogin( $clientLogin ) {
        if ( !is_string($clientLogin) and $clientLogin !== NULL ) {
            throw new \InvalidArgumentException(
                'Client login must be type of string or NULL, ' . gettype($clientLogin) . ' given'
            );
        }
        $this->clientLogin = $clientLogin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientLogin() {
        return $this->clientLogin;
    }

    /**
     * @return AdGroupsService
     */
    public function getAdGroupsService()
    {
        if (!$this->adGroupsService) {
            $this->adGroupsService = new AdGroupsService($this);
        }
        return $this->adGroupsService;
    }

    /**
     * @return AdsService
     */
    public function getAdsService()
    {
        if (!$this->adsService) {
            $this->adsService = new AdsService($this);
        }
        return $this->adsService;
    }

    /**
     * @return BidModifiersService
     */
    public function getBidModifiersService()
    {
        if (!$this->bidModifiersService) {
            $this->bidModifiersService = new BidModifiersService($this);
        }
        return $this->bidModifiersService;
    }

    /**
     * @return BidsService
     */
    public function getBidsService()
    {
        if (!$this->bidsService) {
            $this->bidsService = new BidsService($this);
        }
        return $this->bidsService;
    }

    /**
     * @return CampaignsService
     */
    public function getCampaignsService()
    {
        if (!$this->campaignsService) {
            $this->campaignsService = new CampaignsService($this);
        }
        return $this->campaignsService;
    }

    /**
     * @return ChangesService
     */
    public function getChangesService()
    {
        if (!$this->changesService) {
            $this->changesService = new ChangesService($this);
        }
        return $this->changesService;
    }

    /**
     * @return KeywordsService
     */
    public function getKeywordsService()
    {
        if (!$this->keywordsService) {
            $this->keywordsService = new KeywordsService($this);
        }
        return $this->keywordsService;
    }

    /**
     * @return SitelinksService
     */
    public function getSitelinksService()
    {
        if (!$this->sitelinksService) {
            $this->sitelinksService = new SitelinksService($this);
        }
        return $this->sitelinksService;

    }

    /**
     * @return AdExtensionsService
     */
    public function getAdExtensionsService()
    {
        if (!$this->adExtensionsService) {
            $this->adExtensionsService = new AdExtensionsService($this);
        }
        return $this->adExtensionsService;
    }

    /**
     * @return VCardsService
     */
    public function getVCardsService()
    {
        if (!$this->vcardsService) {
            $this->vcardsService = new VCardsService($this);
        }
        return $this->vcardsService;
    }

    /**
     * @return DictionariesService
     */
    public function getDictionariesService()
    {
        if (!$this->dictionariesService){
            $this->dictionariesService = new DictionariesService($this);
        }
        return $this->dictionariesService;
    }

    /**
     * @return AdImagesService
     */
    public function getAdImagesService()
    {
        if ( !$this->adImagesService ) {
            $this->adImagesService = new AdImagesService($this);
        }
        return $this->adImagesService;
    }

    /**
     * @return ClientsService
     */
    public function getClientsService()
    {
        if ( !$this->clientsService ) {
            $this->clientsService = new ClientsService($this);
        }
        return $this->clientsService;
    }

    /**
     * @return DynamicTextAdTargetsService
     */
    public function getDynamicTextAdTargetsService()
    {
        if ( !$this->dynamicTextAdTargetsService ) {
            $this->dynamicTextAdTargetsService = new DynamicTextAdTargetsService($this);
        }
        return $this->dynamicTextAdTargetsService;
    }

    /**
     * @param string $serviceName
     * @param string $method
     * @param array $params
     * @return mixed
     * @throws DirectApiException
     */
    public function call($serviceName, $method, array $params = [])
    {
        $request = ['method' => $method];

        if ($params) {
            $errors = [];
            $this->validate($params, $errors);
            if ($errors) {
                throw new RequestValidationException($errors);
            }
            $request['params'] = $params;
        }

        $data = $this->getResponse($serviceName, $method, $request);
        return $data->result;
    }

    private $validator;

    /**
     * @return ValidatorInterface
     */
    private function getValidator() {
        if (!$this->validator) {

            $this->validator = Validation::createValidatorBuilder()
                ->enableAnnotationMapping(new CachedReader(new AnnotationReader(), $this->annotationCache, true))
                ->setMetadataCache(new DoctrineCache($this->annotationCache))
                ->getValidator();
        }
        return $this->validator;
    }

    /**
     * @param $params
     * @param $errors
     */
    public function validate($params, &$errors) {
        if (is_array($params) || is_object($params)) {
            foreach ($params as $key => $value) {
                if( $value === self::NULL ) continue;
                if (!is_array($value) && !is_object($value)) continue;

                $result = $this->getValidator()->validate($value);
                if ($result) {
                    foreach ($result as $error) {
                        if (!isset($errors[$key])) {
                            $errors[$key] = [];
                        }
                        /**
                         * @var ConstraintViolation $error
                         */
                        $errors[$key][$error->getPropertyPath()] = $error->getMessage();
                    }
                }
            }
        }
    }

    private $ch;

    /**
     * @return resource
     */
    private function getCurl() {

        if ( !$this->token ) {
            throw new \RuntimeException('Missing authorization token');
        }

        if ( !$this->clientLogin ) {
            throw new \RuntimeException('Missing client login');
        }

        if (!$this->ch) {
            $this->ch = curl_init();

            curl_setopt_array(
                $this->ch,
                [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_POST           => 1,
                    CURLOPT_HEADER         => 1,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_TIMEOUT        => 1200
                ]
            );
        }

        $http_headers = [
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Bearer ' . $this->token,
            'Client-Login: ' . $this->clientLogin,
            'Accept-Language: ru'
        ];

        if ( !!$this->useOperatorPoints ) {
            $http_headers[] = 'Use-Operator-Units: ' . (($this->useOperatorPoints === TRUE) ? 'true' : 'false');
        }

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $http_headers);


        return $this->ch;
    }

    /**
     * @var \JsonMapper
     */
    private $mapper;

    /**
     * @return \JsonMapper
     */
    public function getMapper()
    {
        if (!$this->mapper) {
            $this->mapper = new \JsonMapper();
        }

        return $this->mapper;
    }

    /**
     * @param $serviceName
     * @param $method
     * @param $request
     *
     * @return object
     *
     * @throws DirectApiException
     * @throws DirectApiCurlException
     * @throws DirectApiNullException
     */
    public function getResponse($serviceName, $method, $request) {
        $curl = $this->getCurl();

        $request = json_encode($request, JSON_UNESCAPED_UNICODE);
        // TODO: придумать как обнулять свойства объектов
        $request = preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $request);
        $request = str_replace( '"' . self::NULL . '"', 'null', $request);

        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => ( $this->sandbox ? $this->sandboxUrl : $this->apiUrl ). $serviceName,
                CURLOPT_POSTFIELDS => $request
            ]
        );
        if ( ($response = curl_exec($curl)) !== FALSE ) {

            $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);

            $data = json_decode($body, FALSE, 512, JSON_BIGINT_AS_STRING);
            $regex = '/Units: (\d+)\/(\d+)\/(\d+)/';
            if (preg_match($regex, $header, $matches)) {
                list(, $cost, $last, $limit) = $matches;
                $this->units = $last;
                $this->lastCallCost = $cost;
                $this->unitsLimit = $limit;
            }

            if (isset($data->error)) {
                throw new DirectApiException(
                    $data->error->error_string . '. ' . $data->error->error_detail . ' (' . $serviceName . ', ' . $method . ')',
                    $data->error->error_code
                );
            }

            if (!is_object($data)) {
                throw new DirectApiNullException('Данные не получены');
            }

        } else {
            throw new DirectApiCurlException('Curl error: ' . curl_error($curl), curl_errno($curl));
        }

        return $data;
    }
}