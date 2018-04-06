<?php
namespace app\common\model;
use think\Model;

class BaseModel extends Model {
	protected $autoWriteTimestamp = true;
	public function add($data) {
		$data['list_order'] = 0;
		$data['status'] = 0;
		$this->save($data);
		return $this->id;
	}
}