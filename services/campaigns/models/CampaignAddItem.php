<?php

namespace directapi\services\campaigns\models;


use directapi\components\interfaces\ICallbackValidation;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class CampaignAddItem extends Model implements ICallbackValidation
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
     *     max=255
     * )
     */
    public $Name;

    /**
     * @var string
     * @Assert\Length(
     *     max=255
     * )
     */
    public $ClientInfo;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $StartDate;

    /**
     * @var string
     */
    public $EndDate;

    /**
     * @var TimeTargeting
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\TimeTargeting")
     */
    public $TimeTargeting;

    /**
     * @var string
     */
    public $TimeZone = 'Europe/Moscow';

    /**
     * @var \directapi\common\containers\ArrayOfString
     * @Assert\Valid()
     * @Assert\Type(type="directapi\common\containers\ArrayOfString")
     */
    public $NegativeKeywords;

    /**
     * @var \directapi\common\containers\ArrayOfString
     * @Assert\Valid()
     * @Assert\Type(type="directapi\common\containers\ArrayOfString")
     */
    public $BlockedIps;

    /**
     * @var \directapi\common\containers\ArrayOfString
     * @Assert\Valid()
     * @Assert\Type(type="directapi\common\containers\ArrayOfString")
     */
    public $ExcludedSites;

    /**
     * @var DailyBudget
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\DailyBudget")
     */
    public $DailyBudget;

    /**
     * @var Notification
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\Notification")
     */
    public $Notification;

    /**
     * @var TextCampaignItem
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\TextCampaignItem")
     */
    public $TextCampaign;

    /**
     * @var MobileAppCampaignItem
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\MobileAppCampaignItem")
     */
    public $MobileAppCampaign;

    /**
     * @var DynamicTextCampaignItem
     *
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\DynamicTextCampaignItem")
     */
    public $DynamicTextCampaign;

    /**
     * @Assert\Callback()
     * @param ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->TextCampaign && !$this->MobileAppCampaign && !$this->DynamicTextCampaign) {
            $context->buildViolation(
                'Необходимо указать либо TextCampaign, либо MobileAppCampaign, либо DynamicTextCampaign'
            )
                ->atPath('TextCampaign')
                ->atPath('MobileAppCampaign')
                ->atPath('DynamicTextCampaign')
                ->addViolation();
        }

        $count = 0;
        foreach ( [
            'TextCampaign',
            'MobileAppCampaign',
            'DynamicTextCampaign'
                  ] as $key ) {
            if ( !!$this->{$key} ) {
                $count++;
            }
        }

        if ( $count > 1 ) {
            $context->buildViolation('Можно указать только одно свойство')
                ->atPath('TextCampaign')
                ->atPath('MobileAppCampaign')
                ->atPath('DynamicTextCampaign')
                ->addViolation();
        }

        if ($this->StartDate) {
            $dateTime = new \DateTime($this->StartDate);
            $todayTime = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            if ($dateTime->getTimestamp() < $todayTime) {
                $context->buildViolation('Дата старта кампании не может быть меньше текущей даты')
                    ->atPath('StartDate')
                    ->addViolation();
            }
        }
    }
}