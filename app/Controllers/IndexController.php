<?php
namespace Application\Controllers;

use Application\Interfaces\Action;
use Application\Models\Config\Debag;
use Application\Views\View;

class IndexController implements Action {

    public function run() {
        $view = new View();
        $view->setTpl(VIEWPATH . 'index.php');
        $view->form = $this->getViewForm();
        return $view;
    }

    protected function getViewForm(): View {
        $view = new View();
        $view->setTpl(VIEWPATH . 'form.php');
        return $view;
    }


}
