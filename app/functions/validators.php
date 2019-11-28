<?php


function validate_email_exists($field_value, &$field)
{

    $users = \App\App::$user_repository->load(['email' => $field_value]);
    if (!empty($users)) {
        $field['error'] = 'User with this e-mail already exists!';
        return false;
    } else {
        return true;
    }


}

function validate_is_registered($field_value, &$field)
{
    if (!\App\App::$user_repository->load(['email' => $field_value])) {
        $field['error'] = 'User does not exist';
        return false;
    } else {
        return true;
    }
}

function validate_email_and_password($filtered_input, &$form, $params)
{
    if (!empty($filtered_input['email'])) {
        $user = (\App\App::$user_repository->load(['email' => $filtered_input['email']]))[0];
        if (!empty($user)) {
            if ($user->getPassword() !== $filtered_input['password']) {
                $form['message'] = 'Wrong password';
                return false;
            } else {
                return true;
            }
        }
    }
}