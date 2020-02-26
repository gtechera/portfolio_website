<?php
  function validate_name($data) {
    if (preg_match("/^[a-zA-Z ]*$/",$data)) {
      return true;
    }else { 
      return false;
    } 
    
  }

  function validate_email($data) {
    if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
      return true;
    }else{
      return false;
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['name'] && isset($_POST['subject']))  {
  
    //Email information
    $admin_email = "contact@techera.dev";
    $name = test_input($_POST['name']);
    $subject = test_input($_POST['subject']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $message = test_input($_POST['message']);
    
    //send email
    if (validate_name($name) && validate_email($email)) {
      mail($admin_email, $subject, $message, "From:" . $email);
    
      header('Location: https://techera.dev/gtechera/success.html');
    } 

  }
}
  

?>