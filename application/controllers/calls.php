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
		// $this->load->view('survey1');
		header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
		echo '<Response>';
		echo '<Gather action="/calls/verify_pin" numDigits="4">';
		echo '<Say>Welcome to Bryants Test site</Say>';
		echo '<Say>Please enter your four digit pin number</Say>';
		echo '</Gather>';

		echo '<Say>Sorry, I didnt get your response.</Say>';
		echo '<Redirect>/calls/call_survey1</Redirect>';
		echo '</Response>';

	}

	public function verify_pin()
	{
		header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
 
    # @start snippet
    $pin = (int) $_REQUEST['Digits'];
    # @end snippet

    $user = $this->Call->get_user($pin);

 
    if ($user['pin'] === $pin)
    {
        echo '<Say>Welcome'.$user['first_name'].'</Say>';
    }
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>You didn't make it</Say>";
        echo '<Redirect>/calls/call_survey1</Redirect>';
    }
 
    echo '</Response>';
	}




	



}