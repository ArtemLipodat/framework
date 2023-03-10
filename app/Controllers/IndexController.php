<?php
namespace Application\Controllers;

use Application\Core\View;
use Application\Interfaces\Action;

class IndexController implements Action {

    public function run() {
        $view = new View();
        $view->setTpl(VIEWPATH . 'index.php');
        $view->assign('title', 'Заголовок браузера');
        $view->form = $this->getViewForm();
        return $view;
    }

    protected function getViewForm(): View {
        $view = new View();
        $view->setTpl(VIEWPATH . 'form.php');
        return $view;
    }


}
