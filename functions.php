<?php
$invalid = 'Inserisci una lunghezza valida.';
$randomPassword = '';

function generatePassword()
{
    $availableChars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!"#$%&()*+,-./:;=?@[\]^_{|}~';
    $randomPassword = '';
    for ($i = 0; $i < $_GET['passwordLength']; $i++) {
        $randomPassword .= $availableChars[rand(0, strlen($availableChars))];
    }
    return $randomPassword;
}

if (isset($_GET['passwordLength'])) {
    $passwordLength = $_GET['passwordLength'];
    if (!is_numeric($passwordLength) && ($passwordLength <= 6)) {
        $invalid = 'Nessuna password generata.';
    }
}



if (is_numeric($passwordLength) && ($passwordLength > 6)) {
    echo $randomPassword = generatePassword($passwordLength);
} else {
    echo $invalid;
}
