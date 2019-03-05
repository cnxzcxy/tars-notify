<?php

namespace Tars\nofity\classes;

class ReportInfo extends \TARS_Struct {
	const ETYPE = 1;
	const SAPP = 2;
	const SSET = 3;
	const SCONTAINER = 4;
	const SSERVER = 5;
	const SMESSAGE = 6;
	const STHREADID = 7;
	const ELEVEL = 8;


	public $eType; 
	public $sApp; 
	public $sSet; 
	public $sContainer; 
	public $sServer; 
	public $sMessage; 
	public $sThreadId; 
	public $eLevel; 


	protected static $_fields = array(
		self::ETYPE => array(
			'name'=>'eType',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::SAPP => array(
			'name'=>'sApp',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::SSET => array(
			'name'=>'sSet',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::SCONTAINER => array(
			'name'=>'sContainer',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::SSERVER => array(
			'name'=>'sServer',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::SMESSAGE => array(
			'name'=>'sMessage',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::STHREADID => array(
			'name'=>'sThreadId',
			'required'=>false,
			'type'=>\TARS::STRING,
			),
		self::ELEVEL => array(
			'name'=>'eLevel',
			'required'=>false,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('gc_memberrpc_obj_ReportInfo', self::$_fields);
	}
}
