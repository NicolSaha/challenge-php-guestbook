<?php
declare(strict_types=1);

class GuestbookPost {

    private string $postDate;
    private string $authorName;
    private string $email;
    private string $messageTitle;
    private string $messageContent;

    const FILE_NAME = 'messages_data.json';

    public function __construct($postDate, $authorName, $email, $messageTitle, $messageContent)
    {
        $this->postDate = $postDate;
        $this->authorName = $authorName;
        $this->email = $email;
        $this->messageTitle = $messageTitle;
        $this->messageContent = $messageContent;
    }

}