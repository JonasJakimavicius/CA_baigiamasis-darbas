<?php

require '../../../bootloader.php';

$feedbackForm = new \App\Views\FeedbackForm();

$feedbackForm->getFormAction();

$new_comment = $feedbackForm->validateForm();
$response = new \Core\Api\Response();
if ($new_comment['success']) {
    $response->setData($new_comment[0]->getData());
} else {
    $response->addError('Komentaro parašyti nepavyko.');
}
$response->print();