<?php

use Core\User\User;

function validate_not_empty($field_value, &$field)
{
    if (strlen($field_value) == 0) {
        $field['error'] = 'Field can not be empty';
        return false;
    } else {
        return true;
    }
}

function validate_length($field_value, &$field)
{
    if (strlen($field_value) > 40 || $field_value === null) {
        $field['error'] = 'Field can not be longer than 40 symbols';
        return false;
    } else {
        return true;
    }
}

function validate_is_email($field_value, &$field)
{
    if (!filter_var($field_value, FILTER_VALIDATE_EMAIL)) {
        $field['error'] = 'Your e-mail is incorrect';
        return false;
    } else {
        return true;
    }
}

function validate_string($field_value, &$field)
{
    if (preg_match('~[0-9]~', $field_value)) {
        $field['error'] = 'Field can not contain numbers';
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
