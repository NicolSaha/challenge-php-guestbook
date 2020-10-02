<?php
declare(strict_types=1);

require './Model/GuestbookPost.php';
require './Control/PostManager.php';

//DATE
date_default_timezone_set(ini_get('date.timezone'));
$currentDate = new DateTime();
$currentDateFormatted = $currentDate->format('d/m/Y H:i');

//ERROR MESSAGING
//$errorMessage = '<p class="text-red-600 text-sm italic"> Invalid </p>';
$isFormValid = true;

//CLEAN INPUT DATA
function cleanData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

//SET VARIABLES TO EMPTY
$name = $email = $title = $message = "";

if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['message_title']) && !empty($_POST['message'])) {

//VALIDATE EMAIL
    if (!empty($_POST['email'])) {
        $email = cleanData($_POST['email']);
        filter_var($email, FILTER_VALIDATE_EMAIL);
    } else {
        $isFormValid = false;
    }

//VALIDATE NAME
    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!empty($_POST['full_name'])) {
        $name = cleanData($_POST['full_name']);
        if (preg_match($string_exp, $name) == false) {
            $isFormValid = false;
        }
    } else {
        $isFormValid = false;
    }

//VALIDATE TITLE
    if (!empty($_POST['message_title'])) {
        $title = cleanData($_POST['message_title']);
        if (preg_match($string_exp, $name) == false) {
            $isFormValid = false;
        }
    } else {
        $isFormValid = false;
    }

//VALIDATE MESSAGE
    if (!empty($_POST['message'])) {
        $message = cleanData($_POST['message']);
        if (preg_match($string_exp, $name) == false) {
            $isFormValid = false;
        }
    } else {
        $isFormValid = false;
    }

//CHECK IS FORM IS VALID
    if ($isFormValid == true) {
        // DATE
        $currentDate = new DateTime();
        $currentDateFormatted = $currentDate->format('d/m/Y H:i');

        //SAVE TO GUESTBOOK
        $guestbook = new GuestbookPost($currentDateFormatted, $name, $email, $title, $message);

        //POST TO GUESTBOOK
        $postNow = new PostManager();
        $postNow->savePost();

        //RESET INPUT FIELDS
        $name = $email = $title = $message = "";
    }
}

//POST TO GUESTBOOK
$postManagerShow = new PostManager();
$postsDecodedReversed = $postManagerShow->showPost();

// HTML IMPORT LAST
require './View/guestbook_form.php';

//TODO: Input field with how many visible messages
//TODO: Profanity filter
//TODO: Replace it with an image of such a smiley



