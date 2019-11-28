<?php

namespace App\Views;

use App\App;
use Core\Forms\Form;
use Core\User\User;


class RegisterForm extends Form
{
    protected $data = [
        'attr' => [
            'method' => 'POST',
            'class' => 'registerForm'
        ],
        'fields' => [
            'name' => [
                'type' => 'text',
                'label' => 'Vardas',
                'attr' => [
                    'class' => 'name'
                ],
                'extra' => [
                    'validators' => [
                        'validate_not_empty',
                        'validate_length' => [
                            40
                        ],
                        'validate_string',
                    ],
                ],
            ],
            'surname' => [
                'type' => 'text',
                'label' => 'Pavardė',
                'attr' => [
                    'class' => 'surname'
                ],
                'extra' => [
                    'validators' => [
                        'validate_not_empty',
                        'validate_length' => [
                            40
                        ],
                        'validate_string',
                    ],
                ],
            ],
            'email' => [
                'type' => 'email',
                'label' => 'El. paštas',
                'attr' => [
                    'class' => 'email'
                ],
                'extra' => [
                    'validators' => [
                        'validate_not_empty',
                        'validate_is_email',
                        'validate_email_exists',
                    ],
                ],
            ],
            'password' => [
                'type' => 'password',
                'label' => 'Slaptažodis',
                'attr' => [
                    'class' => 'password'
                ],
                'extra' => [
                    'validators' => [
                        'validate_not_empty',
                    ],
                ],
            ],
            'phone_number' => [
                'type' => 'number',
                'label' => 'Tel. nr.',
                'attr' => [
                    'class' => 'phone_number'
                ],
            ],
        ],
        'buttons' => [
            'Register' => [
                'type' => 'submit',
                'value' => 'register',
                'name' => 'action',
                'title' => 'Register'
            ],
        ],
        'validators' => [
        ],
        'callbacks' => [
            'success' => 'form_success',
            'fail' => 'form_fail',
        ],
    ];

    public function __construct()
    {
        parent::__construct($this->data);

    }

    public function formSuccess($filtered_input, $data)
    {

        $user = new User($filtered_input);
        App::$user_repository->insert($user);
        header('location:/login');

    }

    public function formFail($filtered_input, $data)
    {

        try {
            return $this->render();
        } catch (\Exception $e) {
        }
    }

    public function render($templatePath = '')
    {
        return parent::render('../core/templates/form/form.tpl.php'); // TODO: Change the autogenerated stub
    }
}
