<?php

namespace App\Controller;

use App\Views\LoginForm;
use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    public $form;

    public function __construct()
    {
        parent::__construct();
        $this->form = new LoginForm();

    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializePost()
    {
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {

        $this->page['content'] = ['homeForm' =>(new \App\Views\HomePage())->render()];
        $this->page['stylesheets'][]= 'media/CSS/index.css';
        $this->page['stylesheets'][]= 'media/CSS/responsive.css';
        $this->page['stylesheets'][]= 'media/CSS/footer.css';

    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
    }
};