<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 2019/3/5
 * Time: 08:03
 */

namespace Tars\nofity;

use Tars\nofity\classes\NotifyKey;
use Tars\nofity\classes\NotifyInfo;
use Tars\nofity\classes\ReportInfo;

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

	/**
	 * @param string $sServerName 
	 * @param string $sThreadId 
	 * @param string $sMessage 
	 * @return void
	 */
	public function reportServer($sServerName,$sThreadId,$sMessage){

    }
	/**
	 * @param string $sServerName 
	 * @param int $level 
	 * @param string $sMessage 
	 * @return void
	 */
	public function notifyServer($sServerName,$level,$sMessage){
        $requestPacket = new RequestPacket();
        $requestPacket->_iVersion = $this->_iVersion;
        $requestPacket->_funcName = __FUNCTION__;
        $requestPacket->_servantName = $this->_servantName;
        $encodeBufs = [];
        $__buffer = TUPAPIWrapper::putString('sServerName', 1, $sServerName, $this->_iVersion);
        $encodeBufs['sServerName'] = $__buffer;
        $__buffer = TUPAPIWrapper::putString('level', 2, $level, $this->_iVersion);
        $encodeBufs['level'] = $__buffer;
        $__buffer = TUPAPIWrapper::putString('sMessage', 3, $sMessage, $this->_iVersion);
        $encodeBufs['sMessage'] = $__buffer;
        $buffer_vec = new \TARS_Vector(\TARS::STRING);
        foreach ($buffer as $singlebuffer) {
            $buffer_vec->pushBack($singlebuffer);
        }
        $__buffer = TUPAPIWrapper::putVector('buffer', 4, $buffer_vec, $this->_iVersion);
        $encodeBufs['buffer'] = $__buffer;
        $requestPacket->_encodeBufs = $encodeBufs;
        $sBuffer = $this->_communicator->invoke($requestPacket, $this->_iTimeout);

    }
	/**
	 * @param struct $stKey \Tars/nofity\gc\memberrpc\obj\classes\NotifyKey
	 * @param struct $stInfo \Tars/nofity\gc\memberrpc\obj\classes\NotifyInfo =out=
	 * @return int
	 */
	public function getNotifyInfo(NotifyKey $stKey,NotifyInfo &$stInfo){

    }
	/**
	 * @param struct $info \Tars/nofity\gc\memberrpc\obj\classes\ReportInfo
	 * @return void
	 */
	public function reportNotifyInfo(ReportInfo $info){

    }
}

