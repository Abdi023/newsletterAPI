<?php

require_once 'admin/config.php';

if(isset($_POST['submitted'])) {  

    $name = $_POST['name'];

    $email = $_POST['email'];

    $data = array('name'=>$name,'email'=>$email);

    $db->insertQuery($data, 'subscribers');

    $sql = "SELECT id FROM subscribers WHERE name='$name' AND email='$email' LIMIT 1";

    $subscriber = $db->query($sql);

    $id = $subscriber[0]['id'];

    foreach($_POST['newsletter'] as $n) {

        if($n['subscribe'] == "true") {

            $nlid = $n['nlid'];

            $data = array('subscriber_id'=>$id, 'newsletter_id'=>$nlid);

            $db->insertQuery($data, 'subscriptions');

        }

    }

} else {

    header('Location: index.php');

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" > 

    <head> 

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

        <title>my newsletters</title> 

        <!-- Stylesheets --> 

        <link rel="stylesheet" href="style.css" type="text/css" media="all" /> 

    </head> 

    <body> 

        <div id="header"> 

            <h1>my newsletters</h1> 

        </div> 

        <div id="container"> 

            <h3>Thank you for subscribing!</h3> 

        </div> 

    </body> 

</html>
