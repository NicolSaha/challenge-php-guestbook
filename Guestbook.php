<?php
declare(strict_types=1);

class Guestbook {

    private string $post_date;
    private string $author_name;
    private string $email;
    private string $message_title;
    private string $message_content;

    const FILE_NAME   = 'messages_data.txt';


    public function __construct($post_date, $author_name, $email, $message_title, $message_content)
    {
        var_dump($author_name);
        $this->post_date = $post_date;
        $this->author_name = $author_name;
        $this->email = $email;
        $this->message_title = $message_title;
        $this->message_content = $message_content;
    }

    public function savePost(): void
    {
        // SAVED MESSAGES
        if (file_exists(FILE_NAME)) {
            // Get new message
            $new_message = json_encode($_POST);

            // Get current file
            $get_current_data = file_get_contents(FILE_NAME);

            // Add new message
            $get_current_data .= $new_message;

            // Save message to file
            file_put_contents(FILE_NAME, $get_current_data, FILE_APPEND | LOCK_EX);
        }

    }

    public function showPost()
    {
        // TODO: get data
        $messages = file_get_contents(FILE_NAME);
        var_dump($messages);

        // TODO: display data
        echo $get_current_data . '<br/>';

        $json_saved_messages = json_decode($get_current_data, true);
        echo $json_saved_messages . '<br/>';
    }

}