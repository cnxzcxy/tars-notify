<?php

namespace Tars\notify\classes;

class NotifyInfo extends \TARS_Struct {
	const NEXTPAGE = 1;
	const NOTIFYITEMS = 2;


	public $nextpage; 
	public $notifyItems; 


	protected static $_fields = array(
		self::NEXTPAGE => array(
			'name'=>'nextpage',
			'required'=>true,
			'type'=>\TARS::INT32,
			),
		self::NOTIFYITEMS => array(
			'name'=>'notifyItems',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('gc_memberrpc_obj_NotifyInfo', self::$_fields);
		$this->notifyItems = new \TARS_Vector(new NotifyItem());
	}
}
