<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();
$feedbacks = \App\App::$comment_repository->load($_POST);


if($feedbacks) {
    foreach ($feedbacks as $comment) {

        $response->addData($comment->getData());

    }
}else{
    $response->addError('Could not pull data from database!');
}

$response->print();