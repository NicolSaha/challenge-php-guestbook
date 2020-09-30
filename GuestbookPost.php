<?php
declare(strict_types=1);

class GuestbookPost {

    private string $postDate;
    private string $authorName;
    private string $email;
    private string $messageTitle;
    private string $messageContent;

    const FILE_NAME = 'messages_data.txt';

    public function __construct($postDate, $authorName, $email, $messageTitle, $messageContent)
    {
        $this->postDate = $postDate;
        $this->authorName = $authorName;
        $this->email = $email;
        $this->messageTitle = $messageTitle;
        $this->messageContent = $messageContent;
    }

    /* public function savePost(): void
    {
        // SAVE MESSAGES
        if (file_exists(self::FILE_NAME)) {
            // Get new message
            $newPost = $_POST;

            // Get current file
            $posts = file_get_contents(self::FILE_NAME);
            $postsEncoded = json_encode($posts);
            var_dump($postsEncoded);
            echo gettype($postsEncoded);

            // Add new message
            $postsEncoded .= $newPost;

            // Save message to file
            file_put_contents(self::FILE_NAME, $postsEncoded, FILE_APPEND | LOCK_EX);
        }

    } */


    public function savePost(): void
    {
        // SAVE MESSAGES
        if (file_exists(self::FILE_NAME)) {
            // Get new message
            $newPost = $_POST;

            // Get current file
            $posts = file_get_contents(self::FILE_NAME);
            $posts = json_decode($posts, true);

            // Add new message
            $posts[] = $newPost;
            $posts = json_encode($posts, JSON_PRETTY_PRINT);

            // Save message to file
            file_put_contents(self::FILE_NAME, $posts, FILE_APPEND | LOCK_EX);
        }
    }

    public function showPost()
    {
        // TODO: get data

        $posts = file_get_contents(self::FILE_NAME);
        $encodedPosts = json_encode($posts, JSON_PRETTY_PRINT);
        $decodedPosts = html_entity_decode($encodedPosts);
        $myPostsArray = json_decode($decodedPosts, true);


        var_dump($myPostsArray);
        echo gettype($myPostsArray);


        // Save entries
        //file_put_contents($path, $entries);


        // TODO: display data
       // echo $get_current_data . '<br/>';

       // $json_saved_messages = json_decode($get_current_data, true);
       // echo $json_saved_messages . '<br/>';
    }



}