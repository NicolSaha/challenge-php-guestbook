<?php
declare(strict_types=1);

class PostManager
{

    const FILE_NAME = 'messages_data.json';
    //private $postDate;

    /* public function __construct($postDate)
     {
         $this->postDate = $postDate;
     }*/

    public function savePost(): void
    {
        // SAVE MESSAGES
        if (file_exists(self::FILE_NAME)) {
            $newPost = $_POST;

            $messageData = $tempMessagesArray = array();

            $postsEncoded = json_encode($newPost, JSON_PRETTY_PRINT);
            $messagesRetrieved = json_decode($postsEncoded, true);
            if (($messageInput = file_get_contents(self::FILE_NAME)) != false) {
                $tempMessagesArray = json_decode($messageInput, true);
            }

            array_push($tempMessagesArray, $messagesRetrieved);
            $messageData[] = $tempMessagesArray;
            $jsonData = json_encode($tempMessagesArray);
            file_put_contents(self::FILE_NAME, $jsonData);
        }
    }

    public function showPost()
    {
        //GET POSTS DATA
        $posts = file_get_contents(self::FILE_NAME);
        $postsDecoded = json_decode($posts, true);
        return $postsDecoded;
    }
}

