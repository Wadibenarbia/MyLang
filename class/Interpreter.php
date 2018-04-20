<?php

class Interpreter {

    private $tree = array (
        'type' => 'if',
        'condition' =>
        array (
            'type' => 'INTEGER',
            'value' => '1'
        ),
        'block' =>
        array (
            'type' => 'block',
            'statements' =>
            array(
                array(
                    'type' => 'print',
                    'value' =>
                    array(
                        'type' => 'STRING',
                        'value' => 'Hello',
                    ),
                ),
            ),
            1 =>
            array(
                array(
                    'type' => 'print',
                    'value' =>
                    array(
                        'type' => 'STRING',
                        'value' => 'world',
                    ),
                ),
            ),
        ),
    );

    public function run($tree) {
        var_dump($this->tree);t
    }
}

$Interpreter =  new Interpreter();
$Interpreter->run($tree);
