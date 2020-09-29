<?php
declare(strict_types=1);

require 'guestbook_form.php';
require 'Guestbook.php';

date_default_timezone_set(ini_get('date.timezone'));
//date.timezone = "Europe/Amsterdam"

//Debugging function
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    //echo '<h2>$_COOKIE</h2>';
    //var_dump($_COOKIE);
    //echo '<h2>$_SESSION</h2>';
    //var_dump($_SESSION);
}

whatIsHappening();

// ERROR MESSAGING
$errorMessage = '<p class="text-red-600 text-sm italic"> Invalid </p>';
$isFormValid = true;

//CLEAN INPUT DATA
function cleanData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

//SET TO EMPTY
$name = $email = $title = $message = "";

if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['message_title']) && !empty($_POST['message'])) {

//VALIDATE EMAIL
    if (!empty($_POST['email'])) {
        $email = cleanData($_POST['email']);
        filter_var($email, FILTER_VALIDATE_EMAIL);
    } else {
        $isFormValid = false;
    }

//VALIDATE NAME & EMAIL & TITLE & MESSAGE
    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!empty($_POST['full_name'])) {
        $name = cleanData($_POST['full_name']);
        if (preg_match($string_exp, $name) == false) {
            $isFormValid = false;
        }
    } else {
        $isFormValid = false;
    }

    if (!empty($_POST['message_title'])) {
        $title = cleanData($_POST['message_title']);
        $title = preg_match($string_exp, $title);
    } else {
        $isFormValid = false;
    }

    if (!empty($_POST['message'])) {
        $message = cleanData($_POST['message']);
        $message = preg_match($string_exp, $message);
    } else {
        $isFormValid = false;
    }

    if ($isFormValid == true) {
        // DATE
        $currentDate = new DateTime();
        $currentDateFormatted = $currentDate->format('d/m/Y H:i A');

        var_dump($name);
        //SAVE TO GUESTBOOK
        $guestbook = new Guestbook($currentDateFormatted, $name, $email, $title, $message);
        $guestbook->savePost();

        //POST TO GUESTBOOK
        $guestbook->showPost();

        //RESET INPUT FIELDS
        $name = $email = $title = $message = "";
    }

}


//TODO: Message is then displayed and last message  op top (new-old)
//TODO: Only show the latest 20 posts.





