<?php

namespace Application\Models\Config;

class Debag {
    static function debag($data){
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

    static function p($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}