<?php

namespace Tars\notify\classes;

class NotifyKey extends \TARS_Struct {
	const NAME = 1;
	const IP = 2;
	const PAGE = 3;


	public $name; 
	public $ip; 
	public $page; 


	protected static $_fields = array(
		self::NAME => array(
			'name'=>'name',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::IP => array(
			'name'=>'ip',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::PAGE => array(
			'name'=>'page',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
	);

	public function __construct() {
		parent::__construct('gc_memberrpc_obj_NotifyKey', self::$_fields);
	}
}
