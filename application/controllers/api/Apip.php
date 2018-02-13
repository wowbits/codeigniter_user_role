<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';


/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Apip extends REST_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
            $this->load->library("ion_auth");
            $this->load->helper("url");

            
            $this->load->model("fewbits_model");

    }

    public function register_user_post(){
  
        // variable needs to register web

        $_POST = json_decode(trim(file_get_contents('php://input')), true);

        $f_name=$this->input->post("f_name");
        $l_name=$this->input->post("l_name");
        $email=$this->input->post("email");
        $username=$this->input->post("username");
        $pass=$this->input->post("pass");
        $role=$this->input->post("role");



        $additional_data = array(
            'first_name' => $f_name,
            'last_name' => $l_name,
        );
        

        $group = array($role); // Sets user to admin.

        $this->ion_auth->register($username, $pass, $email, $additional_data, $group);

                 $response = array(
                "status" => "success",
                "response" =>"s ",
                "msg" => null,
                "warn" => null,
                "loggedIn" => false,
            );

         $this->set_response($response, REST_Controller::HTTP_OK);

    }

public function edit_user_post(){
  
        // variable needs to register web

        $_POST = json_decode(trim(file_get_contents('php://input')), true);

        $data=array();

        $data["first_name"]=$this->input->post("f_name");
        $data["last_name"]=$this->input->post("l_name");
        $data["username"]=$this->input->post("username");
        $data["email"]=$this->input->post("email");

        $pass=$this->input->post("pass");
        $id=$this->input->post('id');

        $status=$this->input->post("active");
        $this->fewbits_model->SetUserStatus($id,$status);


        if(strlen($pass)>=6)
            $data["password"]=$pass;


        $role=$this->input->post("role");

        $this->fewbits_model->UpdateUserRole($id,$role);



        $this->ion_auth->update($id,$data);

                 $response = array(
                "status" => "success",
                "response" =>"s ",
                "msg" => null,
                "warn" => null,
                "loggedIn" => false,
            );

         $this->set_response($response, REST_Controller::HTTP_OK);

    }


    public function users_get(){
                

        $arr=[];
        foreach($this->fewbits_model->Users() as $user){
                $data["id"]=$user->id;
                $data["first_name"]=$user->first_name;
                $data["last_name"]=$user->last_name;
                $data["username"] =$user->username;
                $data["email"] =$user->email;
                $data["status"]=$user->active;
                 foreach ($user->groups as  $group) {
                    $data["role"]= $group->name;
                    $data["role_id"]=$group->id;
                 }
                


                 array_push($arr, $data);
           }


                 $response = array(
                "status" => "success",
                "response" =>$arr,
                "msg" => null,
                "warn" => null,
                "loggedIn" => false,
            );
       $this->set_response($response,REST_Controller::HTTP_OK);
}

public function users_duplicate_get(){
                

       
       //$this->set_response($response,REST_Controller::HTTP_OK);
}


public function roles_get(){

        $groups =(array) $this->ion_auth->groups()->result();


            $response = array(
                "status" => "success",
                "response" =>$groups,
                "msg" => null,
                "warn" => null,
                "loggedIn" => false,
            );
       $this->set_response($response,REST_Controller::HTTP_OK);
}



}




    