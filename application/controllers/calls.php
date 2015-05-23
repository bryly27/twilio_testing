<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calls extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Call');

	}

	public function index()
	{
		$array['surveys'] = $this->Call->get_surveys();
		$array['users'] = $this->Call->get_users();
		$this->load->view('main', $array);
	}

	public function call_survey1()
	{
		$this->load->view('survey1');
	}

	public function verify_pin()
	{
		header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
 
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
    # @end snippet
 
    if (count($user_pushed) === 4)
    {
        echo '<Say>You made it</Say>';
    }
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>You didn't make it</Say>";
        echo '<Redirect>handle-incoming-call.php</Redirect>';
    }
 
    echo '</Response>';
	}




	



}