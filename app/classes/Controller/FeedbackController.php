<?php

namespace App\Controller;

use App\Views\FeedbackForm;
use Core\Controller;
use Core\View;

class FeedbackController extends Controller
{
    public $form;

    public function __construct()
    {
        parent::__construct();
        $this->form = new FeedbackForm();
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializePost()
    {
        $this->page['stylesheets'] = 'media/CSS/feedback.css';
        $this->page['content'][] = $this->form->validateForm();
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {
        $this->page['stylesheets'][] = 'media/CSS/feedback.css';
        $this->page['content']['feedback-table'] = (new \App\Views\FeedbackTable())->render();
        $this->page['content']['feedback-form'] = (new \App\Views\FeedbackForm())->render();
        $this->page['scripts']['body_end'][]='media/JS/main.js';

    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
    }
};