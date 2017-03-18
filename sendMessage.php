<?php
/**
 * Created by Skynix Team
 * Date: 01.11.16
 * Time: 15:02
 */
 //proper email: contact@adversent.com
$to = 'info@adversent.com';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $message = clean($_POST['message']);
    if (!empty($name) && !empty($email) && !empty($message)) {
        $email_validate = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if (check_length($name, 1, 35) && check_length($message, 1, 3500) && $email_validate) {
            $message = " Name: {$name} \n Email: {$email} \n Message: {$message}";
            mail($to, "Message from {$name}", $message);
        }
    }
}
function clean($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

function check_length($value, $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}