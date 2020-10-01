<?php
declare(strict_types=1);

class PostManager {

    const FILE_NAME = 'messages_data.json';
    private $postDate;

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
            if(($messageInput = file_get_contents(self::FILE_NAME)) != false){
                $tempMessagesArray = json_decode($messageInput, true);
            }

            array_push($tempMessagesArray, $messagesRetrieved);
            $messageData[] = $tempMessagesArray;
            $jsonData = json_encode($tempMessagesArray);
            file_put_contents(self::FILE_NAME, $jsonData);
        }
    }

    public function showPost(){
    //GET POSTS DATA
    $posts = file_get_contents(self::FILE_NAME);
    $postsDecoded = json_decode($posts, true);

    //SHOW POSTS DATA
    echo '<div class="bg-gray-100 shadow overflow-hidden sm:rounded-md">
    <ul>';

    foreach ($postsDecoded as $postItem) {
    echo '<li>
            <a href="#" class="block hover:bg-gray-100 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                            <div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        <!-- Heroicon name: check-circle -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg> <p  class="text-sm leading-5 font-medium text-indigo-600 truncate">' .  strtoupper($postItem['full_name']) . '</p></div>';
    echo '<div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                    <!-- Heroicon name: mail -->
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    <span class="truncate">' . $postItem['email'] . '</span> </div>';
    echo ' <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
    <!-- Heroicon name: calendar -->
                 <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                  </svg> 
                   <span class="truncate"> Written on ' . $this->postDate . ' </span> </div>
                            </div> <br/>';
    echo '<div class="hidden md:block">
                                <div>
                                    <div class="text-sm leading-5 text-gray-900">
                                         <span> <b><i>Title:</i></b> ' . $postItem['message_title'] . '</span> </div>';
    echo '<div class="mt-2 flex items-center text-sm leading-5 text-gray-900">
                                     ' . $postItem['message'] . '</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <!-- Heroicon name: chevron-right -->
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </a>
        </li>';
    echo '<br/>';
    }

    echo '</ul>
    </div>';

    }

}


