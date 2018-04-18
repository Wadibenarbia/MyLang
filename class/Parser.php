<?php
class Parser {


    public function __construct($parser)
    {
        $this->parser = $parser;
    }

    private function peek() {
        return $this->parser[0];
    }
    private function pop() {
        return array_shift($this->parser);
    }
    private function expect($type) {
        $token = $this->pop();
        if ($type != $token['type']) {
            var_dump($this->parser);
            throw new Exception('Unexpected type ' . $token['type'] . ', wanted: ' . $type);
        }
        return $token;
    }

    private function parse_statement() {
        $rules = [
            [ 'print', 'PRINT' ],
            [ 'if', 'IF' ],

        ];
        switch ($function) {
            case $this->peek()['type'] == 'PRINT':
                $this->pop();
                $value = $this->expect('STRING');
                $this->expect('SEMICOLON');
                return array('type' => 'PRINT', 'value' => $value);
                break;
            case $this->peek()['type'] == 'IF':
                parse_if();
                break;
        }
    }


    private function parse_block() {
        $this->expect('LEFT_BRACE');
        $statements = [];
        while ($statement = $this->parse_statement()) {
            $statements[] = $statement;
        }
        $this->expect('RIGHT_BRACE');
        return array('type' => 'block', 'statements' => $statements);
    }
    private function parse_if() {
        if ($this->parser[0]['type'] == "IF") {
            $this->pop();
            $this->expect('LEFT_PAREN');
            $value = $this->expect('INTEGER');
            $this->expect('RIGHT_PAREN');

            $block = $this->parse_block();
            return array('type' => 'if', 'condition' => $value, 'block' => $block);
            // var_dump($value['value']);
            exit();
            return array();
        }
    }
        public function parsing() {
        $result = $this->parse_if();
        if ($this->parser) {
            exit ('Parse error');
        }
        var_dump($result);
    }
}