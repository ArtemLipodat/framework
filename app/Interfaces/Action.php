<?php
namespace Application\Interfaces;

interface Action {

    public function run();

    public function getViewContent();

}