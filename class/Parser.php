<?php
class Parser {


    public function __construct($parser)
    {
        $this->parser = $parser;
    }

    private function peek() {
        if($this->parser != array()){
            return $this->parser[0];
        }
        return array();
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
        if ($this->peek()['type'] == 'PRINT') { //switch des diff function
            $this->pop();
            $value = $this->expect('STRING');
            $this->expect('SEMICOLON');
            return array('type' => 'PRINT', 'value' => $value);
        }else if($this->peek()['type'] == 'IF'){
            return $this->parse_if();
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
        if ($this->peek()['type'] == "IF") {
            $this->pop();
            $this->expect('LEFT_PAREN');
            $value = $this->expect('INTEGER');
            $this->expect('RIGHT_PAREN');
            $block = $this->parse_block();
            var_dump($block);
            return array('type' => 'if', 'condition' => $value, 'block' => $block);
            exit();

            return array();
        }
    }

    private function parse_func() {
        if ($this->peek()['type'] == "FUNCTION") {
            $this->pop();
            $this->expect('STRING');
            $this->expect('LEFT_PAREN');
            $value = $this->expect('INTEGER');
            $this->expect('RIGHT_PAREN');
            $block = $this->parse_block();
            return array('type' => 'FUNCTION', 'argument' => $value, 'block' => $block);
            exit();
            return array();
        }
    }
        public function parsing($tab) {

        while($this->peek())
        {
            if(array_key_exists($this->peek()['type'],$tab))
            {
                call_user_func($tab[$this->peek()['type']]);
            }else {
                exit('test');
            }
            // $result = $this->parse_if();
            // if ($this->parser) {
            //     exit ('Parse error');
            // }
        }
        // var_dump($result);
    }
}