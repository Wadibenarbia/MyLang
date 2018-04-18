<?php

Class Argument {


    public function __construct($arg, $length) {

        $this->arg = $arg;
        $this->length = $length;
    }

    public function lunch() {

        if($this->length == 3 && $this->arg[1] == "run"){
            return $this->arg[2];
        } else if ($this->length == 2 && $this->arg[1] == "run"){
            echo "No script was filled \n";
            return null;
            } else {
            echo "This command does not exist to see any existing command '--help' \n";
            return null;
        }
    }
}