<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Ion Auth Model
 * @property Bcrypt $bcrypt The Bcrypt library
 * @property Ion_auth $ion_auth The Ion_auth library
 */
class Fewbits_model extends CI_Model
{


	public function __construct(){
			// Load the library (or use spark)
		$this->load->library(array('rb','ion_auth'));

	}


		public function Users(){
			$modified_user[]=array();

			$users = R::findAll( 'users' );

		  		foreach($users as $user){
		  		   $_user["Full Name"] =$user->first_name.' '.$user->last_name;
		  		    $_user["Username"]=$user->username;
		  		    $_user["Email"]=$user->email;
		  		    $_user['Status']=$user->active;
		  		    $modified_user[]=$_user;
				}

//			return $modified_user;
  //		  }


  		  //list the users
			$data = $this->ion_auth->users()->result();
			foreach ($data as $k => $user)
			{
				$data[$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			return $data;
		}

	public function UpdateUserRole($id,$role){
		$this->db->set('group_id',$role);
		$this->db->where('user_id', $id);
		$this->db->update('users_groups'); 
	}


	public function SetUserStatus($id,$status){
		$this->db->set('active',$status);
		$this->db->where('id', $id);
		$this->db->update('users'); 
	}

}