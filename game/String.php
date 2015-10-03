<?php

class String {
    private $string;

    public function __construct($string) {
        $this->string = $string;
    }

    public function replace($search, $replace) {
        return new String(str_replace($search, $replace, $this->string));
    }

    public function value() {
        return $this->string;
    }
}
