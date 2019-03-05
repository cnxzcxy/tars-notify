<?php

namespace Tars\notify\classes;

class NotifyItem extends \TARS_Struct {
	const STIMESTAMP = 1;
	const SSERVERID = 2;
	const ILEVEL = 3;
	const SMESSAGE = 4;


	public $sTimeStamp; 
	public $sServerId; 
	public $iLevel; 
	public $sMessage; 


	protected static $_fields = array(
		self::STIMESTAMP => array(
			'name'=>'sTimeStamp',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::SSERVERID => array(
			'name'=>'sServerId',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::ILEVEL => array(
			'name'=>'iLevel',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::SMESSAGE => array(
			'name'=>'sMessage',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('gc_memberrpc_obj_NotifyItem', self::$_fields);
	}
}
