<?php
include("./functions.php");


$email = sanitize($_POST["email"]);

$sql = "SELECT * FROM `users` WHERE `email` = '$email'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    echo '<div class="alert alert-danger" role="alert">
    Er is iets fout gegaan. Probeer het nog eens.</div>';
    header("Refresh: 4; url=./index.php?content=registerform");
} else {

    date_default_timezone_set("Europe/Amsterdam");

    $date = date('d-m-Y H:i:s');
    $part_of_email = substr($email, 3, 4);

    $password = $date . $part_of_email;
    $password_hash = password_hash($password, PASSWORD_BCRYPT);




    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']) && !empty($_POST['adress']) && !empty($_POST['postalcode']) && !empty($_POST['city'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];
        $postalcode = $_POST['postalcode'];
        $city = $_POST['city'];
    }

    $firstname = sanitize($_POST["firstname"]);
    $lastname = sanitize($_POST["lastname"]);
    $phone = sanitize($_POST["phone"]);
    $adress = sanitize($_POST["adress"]);
    $postalcode = sanitize($_POST["postalcode"]);
    $city = sanitize($_POST["city"]); 
    
    $sql = "INSERT INTO `users`(`iduser`,
                             `password`,
                             `firstname`,
                             `lastname`, 
                             `email`,
                             `phone`,
                             `address`, 
                             `postalcode`, 
                             `city`) 
                VALUES      (NULL,
                            '$password',
                            '$firstname',
                            '$lastname',
                            '$email',
                            '$phone',
                            '$adress',
                            '$postalcode',
                            '$city')";
    //echo $sql;
    $result = mysqli_query($conn, $sql);

    $id = mysqli_insert_id($conn);

    //var_dump($result);

    if ($result) {
        $to = $email;
        $subject = "Activatielink http://www.polarwatch.org";
        $message = '<!DOCTYPE html>
    <html>
    <body>
    <h1>Beste klant,<h1>
    <p>Bedankt voor het registreren, door op onderstaande link te klikken wordt het registratieproces voltooid.</p> <a href="http://www.polarwatch.org/index.php?content=createpassword&id=' . $id . '&pw=' . $password_hash . '"> Activeer uw account.</a>


    </body>
    </html>';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <admin@loginsysteem.nl>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";
        $headers .= 'Bcc: myboss@example.com' . "\r\n";
        mail($to, $subject, $message, $headers);

        echo '<div class="alert alert-info" role="alert">
    U heeft een email gekregen met een activatielink. Klik hierop om het registreren te voltooien.</div>';
        header("Refresh: 4; url=./index.php?content=registerform");
    } else {
        echo '<div class="alert alert-danger" role="alert">
    Er is iets fout gegaan met de registratie. Probeer het nog maals.</div>';
        header("Refresh: 4; url=./index.php?content=registerform");
    }
}
