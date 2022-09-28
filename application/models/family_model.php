<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Family_model extends CI_Model
{

    public function registerSumbit($username, $email, $password){

        $data  = array(
                    'username'            => $username,
                    'email'               => $email,
                    'password'            => md5($password)
                );
        $queryOpt = $this->db->insert( 'user', $data );

        $result = new stdClass();

        if(!$queryOpt) {

            $result->output = "FALSE";
            $result->message = "Unable to create user. Try again.";
        }
        else {

            $result->output = "TRUE";
            $result->message = "User successfully registered";
        }

        return $result;
    }

    public function loginSumbit($email, $password){

        $this->db->where('email',$email);
        $this->db->where('password',md5($password));
   		$query = $this->db->get('user');

        $result = new stdClass();

        if($query->num_rows() > 0){

            $userInfo = $query->row();
            $newdata  = array(
                            'userid'    => $userInfo->id,
                            'username'  => $userInfo->username,
                            'useremail' => $userInfo->email
                        );
            $this->session->set_userdata( $newdata );
            
            $result->output = "TRUE";
            $result->message = "User Successfully Login";
        }
        else {

            $result->output = "False";
            $result->message = "Please Try agein";
        }

        return $result;
    }

    public function familyinfo($name){

        // if($name != "") {

        //     $this->db->like('name', trim($name));
        // }
        // $this->db->where('created_by', $this->session->userdata('userid'));
        // $this->db->order_by("name", "asc");
        // $result = $this->db->get('family')->result();

        $where = "";

        if($name !=""){

            $where = " WHERE a.name like '%".$name."%'";
        }

        $result = $this->db->query("SELECT a.id, a.name, a.surname, a.mobno, a.photo, a.address, a.hobbies, a.pincode, c.state, d.city, (SELECT count(*) FROM family_members AS b WHERE b.family_head = a.id) AS familyMembers 
                                    FROM family a
                                    LEFT JOIN state_master AS c ON a.state=c.id 
                                    LEFT JOIN city_master AS d ON a.city=d.id 
                                    $where
                                    ORDER BY a.name ASC")->result();
        return $result;
    }

    public function createfamilysave($name, $surname, $dob, $mobno, $address, $state, $city, $pincode, $mStatus, $wdob, $hobbies, $photo){

        $data  = array(
                    'name'       => $name,
                    'surname'    => $surname,
                    'dob'        => $dob,
                    'mobno'      => $mobno,
                    'address'    => $address,
                    'state'      => $state,
                    'city'       => $city,
                    'pincode'    => $pincode,
                    'mStatus'    => $mStatus,
                    'wdob'       => $wdob,
                    'hobbies'    => implode(",", $hobbies),
                    'photo'      => $photo,
                    'created_by' => $this->session->userdata('userid')
                );
        $queryOpt = $this->db->insert( 'family', $data );

        $result = new stdClass();

        if(!$queryOpt) {

            $result->output = "FALSE";
            $result->message = "Error In Data Upload";
        }
        else {

            $result->output = "TRUE";
            $result->message = "Family Head successfully added.";
        }

        return $result;
    }

    public function addMembersSave($familyId, $name, $dob, $mStatus, $wdob, $education, $photo){

        $data  = array(
                        'family_head' => $familyId,
                        'name'        => $name,
                        'dob'         => $dob,
                        'mStatus'     => $mStatus,
                        'wdob'        => $wdob,
                        'education'   => $education,
                        'photo'       => $photo,
                        'created_by'  => $this->session->userdata('userid')
                    );

        $queryOpt = $this->db->insert( 'family_members', $data );

        $result = new stdClass();

        if(!$queryOpt) {

            $result->output = "FALSE";
            $result->message = "Error In Data Upload";
        }
        else {

            $result->output = "TRUE";
            $result->message = "Family Member successfully added.";
        }

        return $result;
    }

    public function stateList(){

        $this->db->order_by('state', 'asc');
        $query = $this->db->get('state_master')->result();
        
        $result = new stdClass();
        
        if(!$query){
            
            $result->output = "FALSE";
            $result->result = array();
        }
        else {

            $result->output = "TRUE";
            $result->result = $query; 
        }

        return $result;
    }

    public function cityList($stateId){

        $this->db->select('id, city');
        $this->db->where('state_id', $stateId);
        $this->db->order_by('city', 'asc');
        $query = $this->db->get('city_master')->result();
        
        $result = new stdClass();
        
        if(!$query){
            
            $result->output = "FALSE";
            $result->result = array();
        }
        else {

            $result->output = "TRUE";
            $result->result = $query; 
        }

        return $result;
    }

    public function viewMembers($familyId){

        $familyHead = $this->db->query("SELECT a.id, a.name, a.surname, a.mobno, a.address, a.photo, a.pincode, b.state, c.city 
                                    From family AS a 
                                    LEFT JOIN state_master AS b ON a.state=b.id 
                                    LEFT JOIN city_master AS c ON a.city=c.id
                                    WHERE a.id = $familyId
                                    ORDER BY a.name ASC")->row();

        $this->db->where("family_head", $familyId);
        $familyList = $this->db->get("family_members")->result();

        $result = new stdClass();

        $result->familyHead = $familyHead;
        $result->familyList = $familyList;
        return $result;
    }

}//Welcome_model end
?>