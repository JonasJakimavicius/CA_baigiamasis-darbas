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

function validate_length($field_value, &$field, $params)
{
    if (strlen($field_value) > $params[0] || $field_value === null) {
        $field['error'] = 'Field value is to long';
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




