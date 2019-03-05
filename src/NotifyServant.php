<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 2019/3/5
 * Time: 08:03
 */

namespace Tars\notify;

use Tars\notify\classes\NotifyKey;
use Tars\notify\classes\NotifyInfo;
use Tars\notify\classes\ReportInfo;

use Tars\client\CommunicatorConfig;
use Tars\client\Communicator;
use Tars\client\RequestPacket;
use Tars\client\TUPAPIWrapper;

class NotifyServant {

    protected $_communicator;
    protected $_iVersion;
    protected $_iTimeout;
    public $_servantName = 'tars.tarsnotify.NotifyObj';

    public function __construct(CommunicatorConfig $config,
        $servantName = "tars.tarsnotify.NotifyObj")
    {
        $this->_servantName = $servantName;
        $config->setServantName($this->_servantName);

        $this->_communicator = new Communicator($config);
        $this->_iVersion = $config->getIVersion();
        $this->_iTimeout = empty($config->getAsyncInvokeTimeout()) ? 2000 : $config->getAsyncInvokeTimeout();
    }

	public function reportNotifyInfo(ReportInfo $info){
        $requestPacket = new RequestPacket();
        $requestPacket->_iVersion = $this->_iVersion;
        $requestPacket->_funcName = __FUNCTION__;
        $requestPacket->_servantName = $this->_servantName;
        $encodeBufs = [];

        $__buffer = TUPAPIWrapper::putStruct('info', 1, $info, $this->_iVersion);
        $encodeBufs['info'] = $__buffer;
        $requestPacket->_encodeBufs = $encodeBufs;
        $sBuffer = $this->_communicator->invoke($requestPacket, $this->_iTimeout);


    }
}

