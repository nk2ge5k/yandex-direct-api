<?php

namespace directapi\services\ads\enum;

use directapi\components\Enum;

class MobileAppAdActionEnum extends Enum
{
    const DOWNLOAD = 'DOWNLOAD';
    const GET = 'GET';
    const INSTALL = 'INSTALL';
    const MORE = 'MORE';
    const OPEN = 'OPEN';
    const UPDATE = 'UPDATE';
    const PLAY = 'PLAY';
    const BUY_AUTODETECT = 'BUY_AUTODETECT';
}
