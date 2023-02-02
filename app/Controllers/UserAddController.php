<?php

namespace Application\Controllers;


use Application\Core\Database;
use Application\Interfaces\Action;
use Application\Models\Config\Debag;
use Application\Views\View;

class UserAddController implements Action {

    private $values = null;

    public function __construct($data) {
        $this->setValues($data);
    }

    public function run() {
        $view = $this->getViewForm();

        if (!$this->checkValues() && $this->add()) {
            $view->error = $this->getViewError(['Успешно'], true);
            return $view;
        }
        $view->error = $this->getViewError(['Что-то пошло не так']);
        return $view;
    }


    protected function getViewForm(): View {
        $view = new View();
        $view->setTpl(VIEWPATH . 'form.php');
        return $view;
    }

    protected function getViewError($error, $success = false ) {
        $view = new View();
        $view->setTpl( VIEWPATH . 'error.php');
        $view->assign('error', $error);
        $view->assign('success', $success);
        return $view;
    }


    private function checkValues() {
        $values = $this->getValues();

        foreach ($values as $k => $val) {
            if ($k === 'name' || $k === 'lastname') {
                if (!is_string($val) || empty($val)){
                    return true;
                }
            }
            if ($k === 'age') {
                if (!is_numeric($val) || empty($val)) {
                    return true;
                }
            }
        }
        return false;
    }


    private function add() {
        $db = Database::getInstance();
        $keys = null;
        $values = null;
        foreach ($this->getValues() as $k => $v) {
            $keys[] = $k;
            $values[] =  "'" . $db->getConnection()->real_escape_string($v) . "'";;
        }

        $sql = 'INSERT INTO USERS ('. implode(',', $keys) .') VALUES ('. implode(',', $values) .')';

        return $db->insert($sql);
    }


    /**
     * @param null $values
     */
    public function setValues($values): void {
        $this->values = $values;
    }

    /**
     * @return null
     */
    public function getValues() {
        return $this->values;
    }


}
