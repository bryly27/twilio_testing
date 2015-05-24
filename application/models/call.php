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
     

    function get_user($pin)
    {
        return $this->db->query("SELECT * FROM users WHERE users.pin = ?", $pin)->row_array();
    }

    function add_review($id, $rating)
    {
        $query("INSERT INTO surveys (rating, user_id) VALUES (?, ?)");
        $values(array($id, $rating));
        $this->db->query($query, $values);
    }

}
