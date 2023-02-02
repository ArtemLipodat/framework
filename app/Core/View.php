<?php
namespace Application\Core;

class View {
    private $tpl;
    private array $data = [];
    private array $widgets = [];

    /**
     *
     * @param $k
     * @param $v
     */
    function assign($k, $v) {
        $this->data[$k] = $v;
    }

    function get($k, $default = null) {
        return $this->data[$k] ?? $default;
    }

    function setTpl($tpl) {
        if (file_exists($tpl)) $this->tpl = $tpl;
    }

    function display() {
        if ($this->tpl) include $this->tpl;
    }

    function __set($name, $value) {
        $this->widgets[$name] = $value;
    }

    function __get($name) {
        return $this->widgets[$name] ?? new EmptyView();
    }
}