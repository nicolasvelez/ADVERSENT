<?php
/**
 * Created by Skynix Team
 * Date: 02.11.16
 * Time: 14:57
 */
define('UK_COUNTRY', 'UK');
define('US_COUNTRY', 'US'); // default country
define('UK_PHONE_NUMBER', '020-3740-8061');
define('US_PHONE_NUMBER', '+1 (323) 300-5349');
$country = US_COUNTRY;
if (!isset($_COOKIE['country'])) {
    $url = 'http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR'];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curlData = curl_exec($curl);
    curl_close($curl);
    if ($data = @unserialize($curlData)) {
        if ($data['geoplugin_countryCode'] == UK_COUNTRY) {
            $country = UK_COUNTRY;
            setcookie('country', UK_COUNTRY, time()+3600*24*30*12*10);  // expire in 10 years
        } else {
            $country = US_COUNTRY;
            setcookie('country', US_COUNTRY, time()+3600*24*30*12*10);  // expire in 10 years
        }
    }
} else {
    $country = $_COOKIE['country'];
}
switch ($country) {
    case US_COUNTRY:
        $phoneMobile = US_PHONE_NUMBER;
        break;
    case UK_COUNTRY:
        $phoneMobile = UK_PHONE_NUMBER;
        break;
}