<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
?>


  <Response>
    <Gather action="/calls/verify_pin" numDigits="1">
        <Say>Welcome to Bryant's Test site</Say>
        <Say>Please enter your four digit pin number</Say>
    </Gather>

    <Say>Sorry, I didn't get your response.</Say>
    <Redirect>/calls/call_survey1</Redirect>
</Response>

 
