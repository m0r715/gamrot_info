<?php
$contactName = $_POST["contactName"];
$contactEmail = $_POST["contactEmail"];
$contactMessage = $_POST["contactMessage"];

$errorMSG = "";

$EmailTo = "krzysztof@gamrot.info";
$Subject = "[CONTACT FORM] New Message from @ Gamrot.info";

// server-side validation

// NAME
if (empty($_POST["contactName"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["contactName"];
}

// EMAIL
if (empty($_POST["contactEmail"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["contactEmail"];
}

// MESSAGE
if (empty($_POST["contactMessage"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["contactMessage"];
}

// prepare email body text
$Body .= "Name: ";
$Body .= $contactName;
$Body .= "\n";

$Body .= "Email: ";
$Body .= $contactEmail;
$Body .= "\n";

$Body .= "Message: ";
$Body .= $contactMessage;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
  if($errorMSG == ""){
    echo "Something went wrong. Please try again later.";
  } else {
    echo "$errorMSG";
  }
}

?>
