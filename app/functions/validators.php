<?php

function validate_login($filtered_input, &$form) {
    $login_success = \App\App::$session->login(
            $filtered_input['email'],
            $filtered_input['password']
    );

    if (!$login_success) {
        $form['fields']['password']['error'] = 'Prisijungimo duomenys neteisingi!';
        $form['fields']['password']['value'] = '';
        return false;
    }
    return true;
}

function validate_email_exists($field_value, &$field) {

    $users = \App\App::$user_repository->load(['email' => $field_value]);
    if (!empty($users)) {
     $field['error'] = 'User with this e-mail already exists!';
        return false;
    }else{
        return true;
    }
    

}