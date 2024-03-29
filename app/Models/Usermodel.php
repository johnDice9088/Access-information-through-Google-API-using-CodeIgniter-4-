<?php

namespace App\Models;
use CodeIgniter\Model;

class Usermodel extends Model
{
    protected $table= 'user';
    protected $primaryKey = 'id';
    protected $DBGroup= 'default';
    protected $allowedFields = ['oauth_id','name ',' email','img','created','updated'];

    function isAlreadyRegister($authid){
		return $this->db->table('user')->getWhere(['oauth_id'=>$authid])->getRowArray()>0?true:false;
	}
	function updateUserData($userdata, $authid){
		$this->db->table("user")->where(['oauth_id'=>$authid])->update($userdata);
	}
	function insertUserData($userdata){
		$this->db->table("user")->insert($userdata);

}
}