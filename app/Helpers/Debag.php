<?php

namespace Application\Helpers;

class Debag {

    static function p($data) {
        echo '<pre>';
            print_r($data);
        echo '</pre>';
    }

}