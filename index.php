<?php
include __DIR__ . '/functions.php';


$invalid = 'Inserisci una lunghezza valida.';
$randomPassword = '';

if (isset($_GET['passwordLength'])) {
    $passwordLength = $_GET['passwordLength'];
    if (!is_numeric($passwordLength) && ($passwordLength <= 6)) {
        $invalid = 'Nessuna password generata.';
    }
}

function generatePassword()
{
    $availableChars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!?/';
    $randomPassword = '';
    for ($i = 0; $i < $_GET['passwordLength']; $i++) {
        $randomPassword .= $availableChars[rand(0, strlen($availableChars))];
    }
    return $randomPassword;
}

if (is_numeric($passwordLength) && ($passwordLength > 6)) {
    echo $randomPassword = generatePassword($passwordLength);
} else {
    echo $invalid;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Style-->
    <link rel="stylesheet" type="text/css"
        href="./general-style/style.css">
</head>

<body>
    <h1 class="text-center mt-5">Strong Password Generator</h1>
    <h3 class="text-center text-light">Genera una password sicura</h3>

    <main>
        <div class="container bg-white">
            <div class="row">
                <div class="col-12 password-display d-flex align-items-center">
                    <h5> <strong> <?php echo $randomPassword ? 'La tua password generata è:   ' . $randomPassword : $invalid   ?> </strong></h5>

                </div>
                <div class="col-12 input-col">
                    <form action="index.php" method="GET">
                        <div class="form-group">

                            <input type="text" class="form-control w-25" name="passwordLength" id="passwordLength" placeholder="Inserisci la lunghezza della password">
                        </div>

                        <button type="submit" class="btn btn-secondary">Resetta</button>
                        <button class="btn btn-dark">Genera</button>




                    </form>

                </div>
            </div>
        </div>






    </main>
</body>

</html>