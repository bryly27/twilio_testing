<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Call extends CI_Model {

    function get_users()
    {
        return $this->db->query("SELECT * FROM users")->result_array();
    }

    function get_surveys()
    {
        return $this->db->query("SELECT users.first_name, users.last_name, surveys.* FROM surveys LEFT JOIN users ON users.id = surveys.user_id")->result_array();
    }
     

}
