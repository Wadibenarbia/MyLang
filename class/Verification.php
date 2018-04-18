<?php

Class Verification {


    private $error = array();
    private $var = 0;

    public function __construct($file, $error = array(), $var = 0) {

        $this->error = $error;
        $this->file = $file;
        $this->var = $var;
    }

    public function is_ready() {

        if (!is_file($this->file)) {
            $this->error[$this->var++] = "The file does not exist \n";
        }
    }

    public function is_read() {

        if (!is_readable($this->file)){
            $this->error[$this->var++] = "You do not have rights to read on this file \n";
        }
    }

    public function my_extension () {

        $pattern = "/^[a-zA-Z_]+(.po)+$/";
        if ( !preg_match($pattern, trim($this->file))) {
            $this->error[$this->var++] = "The file extension is incorrect for more information '--help' \n";
        }
    }

    public function error() {

        if ($this->error == array()) {
            echo "\033[32m[Ok] initization file \33[0m \n";
            return true;
        } else if ($this->file == null) {
            return false;
        } else {
            echo "\033[31m[Failed] ".$this->error[0]."\33[0m";
        }
        return false;
    }

}