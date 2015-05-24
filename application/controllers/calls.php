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
    $call_number = $_REQUEST['From'];
    $user = $this->Call->get_user($pin);
   //  echo '<Say>'.$user['pin'].'</Say>';
   //  echo '<Say>'.$pin.'</Say>';
   //  echo '<Say>'.$call_number.'</Say>';
 		// echo '<Say>'.$user['first_name'].'</Say>';
    if ($user['pin'] == $pin)
    {
			echo '<Gather action="/calls/survey/'.$user['id'].'" numDigits="1">';
      echo '<Say>If your first name is '.$user['first_name'].', please press 1</Say>';
      echo '<Say>If the information is incorrect, please press 2</Say>';
      echo '</Gather>';
    }
    else 
    {
      echo '<Say>Sorry, We could not find you in our system.</Say>';
    	echo '<Redirect>/calls/call_survey1</Redirect>';
    }
    echo '<Say>Sorry, I did not get that.</Say>';
    echo '<Redirect>/calls/call_survey1</Redirect>';
 
    echo '</Response>';
	}

	public function survey($id)
	{
		header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
		echo '<Response>';

		$number = (int) $_REQUEST['Digits'];

		if($number == 1)
		{
			echo '<Gather action="/calls/rating/'.$id.'" numDigits="1">';
			echo '<Say>Using the keypad, on a scale of 1 to 5 with 5 being the highest, please rate our service.</Say>';
			echo '</Gather>';
		}
		else
		{
			echo '<Redirect>/calls/call_survey1</Redirect>';
		}
		echo '<Say>Sorry, I did not get that.</Say>';
		echo '<Redirect>/calls/survey/</Redirect>';
		echo '</Response>';
	}

	public function rating($id)
	{
		header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';

    echo '<Response>';
    $rating = (int) $_REQUEST['Digits'];
    $call_number = $_REQUEST['From'];
    $user = $this->Call->get_user_by_id($id);
    $this->Call->add_review($rating, $id);
    echo '<Say>Thank you for your input. Good bye. </Say>';
    echo '<Sms from="+14152879680" to="'.$call_number.'">Thank you for your call '.$user['first_name'].'.</Sms>';
 		echo '</Response>';
	}




	



}