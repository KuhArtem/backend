<?php
function sortCities($citiesString) {
    $cities = explode(' ', $citiesString);
    sort($cities);
    return implode(' ', $cities);
}

function daysBetweenDates($date1, $date2) {
    $diff = date_diff(date_create($date1), date_create($date2));
    return $diff->format("%a");
}

function extractFileName($path) {
    return pathinfo($path, PATHINFO_FILENAME);
}

function generatePassword($length = 10) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $password;
}

function isPasswordStrong($password) {
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/', $password);
}
?>
