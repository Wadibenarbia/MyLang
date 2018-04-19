<?php
class Parser {

    private $My_function = [
        [ 'IF', "parse_if()" ],
        [ 'PRINT', "parse_print()"  ]
    ];

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
            throw new Exception('Unexpected type ' . $token['type'] . ', wanted: ' . $type);
        }
        return $token;
    }
    private function parse_statement() {
        foreach ($this->My_function as $my_func) {
            if (peek()['type'] == $my_func[0])
                $my_func[1]();
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
    private function parse_print() {
        echo "\nYEAAAAAA\n";
        $this->pop();
        $value = $this->expect('STRING');
        echo "\n\ntest\n\n";
        $this->expect('SEMICOLON');
        return array('type' => 'PRINT', 'value' => $value);
    }

        public function parsing() {
        $result = $this->parse_if();
        if ($this->parser) {
            exit ('Parse error');
        var_dump($result);
        }
    }
}