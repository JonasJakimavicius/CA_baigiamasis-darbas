<?php

namespace App\Controller;

use App\App;
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
        if (App::$session->isLoggedIn()) {
            $this->page['stylesheets'] = 'media/CSS/feedback.css';
            $this->page['content'][] = $this->form->validateForm();
        } else {
            $this->page['stylesheets'] = 'media/CSS/feedback.css';
            $this->page['content'][] = (new \App\Views\FeedbackNotLoggedIn())->render();
        }
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {
        if (App::$session->isLoggedIn()) {
            $this->page['stylesheets'][] = 'media/CSS/feedback.css';
            $this->page['content']['feedback-table'] = (new \App\Views\FeedbackTable())->render();
            $this->page['content']['feedback-form'] = (new \App\Views\FeedbackForm())->render();
            $this->page['scripts']['body_end'][] = 'media/JS/main.js';
        } else {
            $this->page['content']['feedback-table'] = (new \App\Views\FeedbackTable())->render();
            $this->page['stylesheets'][] = 'media/CSS/feedback.css';
            $this->page['content'][] = (new \App\Views\FeedbackNotLoggedIn())->render();
            $this->page['scripts']['body_end'][] = 'media/JS/main.js';
        }
    }

    public function onRender()
    {
        try {
            return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
        } catch (\Exception $e) {
        }
    }
}

;