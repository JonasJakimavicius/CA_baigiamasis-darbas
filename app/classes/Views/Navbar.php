<?php
namespace App\Views;
use App\App;
class Navbar extends \Core\View {
    public function __construct($data = []) {
        parent::__construct($data);
        $this->addLink('left', '/', 'Titulinis');
        $this->addLink('left', '/feedback', "Atsiliepimai");


        if (App::$session->isLoggedIn()) {
            $user = App::$session->getUser();
            $label = $user->getEmail();
            $this->addLink('right', '/logout', "Atsijungti($label)");

        } else {
            $this->addLink('right', '/login', 'Prisijungti');
            $this->addLink('right', '/register', 'Registruotis');
        }
    }
    public function addLink($section, $url, $title) {
        $link = ['url' => $url, 'title' => $title];

        if ($_SERVER['REQUEST_URI'] == $link['url']) {
            $link['active'] = true;
        }

        $this->data[$section][] = $link;
    }
    public function render($template_path = ROOT . '/app/templates/navigation.tpl.php') {
        return parent::render($template_path);
    }
}