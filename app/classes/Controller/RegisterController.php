<?php

namespace App\Controller;

use Core\Controller;
use App\Views\RegisterForm;
use Core\User\User;
use App\App;
use Core\View;

class RegisterController extends Controller
{
    public $form;

    public function __construct()
    {
        parent::__construct();
        $this->form = new RegisterForm();
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializePost()
    {

        $this->page['content'] = ['register' => $this->form->validateForm()];
        $this->page['stylesheets'][]= 'media/CSS/forms.css';
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {
        $this->page['content'] = ['register' => (new \App\Views\RegisterForm())->render()];
        $this->page['stylesheets'][]= 'media/CSS/forms.css';
    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
    }
};