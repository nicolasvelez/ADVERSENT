<?php
/**
 * Created by Skynix Team
 * Date: 31.10.16
 * Time: 18:20
 */

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Thank you for joining";
    $date = date(DATE_RFC822);
    $message = "Email: {$_POST['email']}";
    mail("info@adversent.com", "New request from {$date}", $message);
}