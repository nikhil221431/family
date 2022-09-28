<?php
if ( !defined( 'BASEPATH' ) )
  exit( 'No direct script access allowed' );
class Validate_model extends CI_Model {

    public function validate(){

        $userId = $this->session->userdata('userid');
        
        $result = new stdClass();
        
        if($userId == "" || $userId == null){

            $result->output = "FALSE";
		}
        else {

            $result->output = "TRUE";
        }

        return $result;
    }
}//Validate_model end
?>