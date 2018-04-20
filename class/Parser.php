<?php
class Parser {

    private  $finaly = array();

    public function __construct($parser ,$tab)
    {
        $this->parser = $parser;
        $this->tab = $tab;
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

    private function parse_print() {
        if ($this->peek()['type'] == 'PRINT') { //switch des diff function
            $this->pop();
            $value = $this->expect('STRING');
            $this->expect('SEMICOLON');
            return array('type' => 'PRINT', 'value' => $value);
        }
    }

    private function parse_statement() {
        if(array_key_exists($this->peek()['type'],$this->tab)){
            return call_user_func($this->tab[$this->peek()['type']]);
        }
    }

    private function parse_block() {
        $this->expect('LEFT_BRACE');
        $statements = [];
        while ($this->peek()['type'] != 'RIGHT_BRACE'){
            while ($statement = $this->parse_statement()) {
                $statements[] = $statement;
            }
        }
        $this->expect('RIGHT_BRACE');
        return array('type' => 'block', 'statements' => $statements);
    }

    private function parse_var() {
        if ($this->peek()['type'] == "VARIABLE") {
            $this->pop();
            $this->expect('STRING');
            if($this->peek()['type'] == "EGAL"){
                $this->pop();
            if($this->peek()['type'] == 'STRING'){
                $value = $this->expect('STRING');
            }else{
                $value = $this->expect('INTEGER');
            }
                $this->expect('SEMICOLON');
                return array('type' => 'varible', 'value' => $value);
                exit();
                return array();
            } else {
            $this->expect('SEMICOLON');
            return array('type' => 'varible');
            exit();
            return array();
            }
        }
    }
    private function parse_if() {
        if ($this->peek()['type'] == "IF") {
            $this->pop();
            $this->expect('LEFT_PAREN');
            $value = $this->expect('INTEGER');
            if($this->peek()['type'] == 'COMPARE'){
               $compare = $this->expect('COMPARE');
                $val = $this->expect('INTEGER');
                $this->expect('RIGHT_PAREN');
                $block = $this->parse_block();
                return array('type' => 'if', 'condition' => array($value, $compare, $val), 'block' => $block);
                exit();
                return array();
            }
            $this->expect('RIGHT_PAREN');
            $block = $this->parse_block();
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
            $this->expect('RIGHT_PAREN');
            $block = $this->parse_block();
            return array('type' => 'FUNCTION', 'block' => $block);
            exit();
            return array();
        }
    }
        public function parsing() {

        while($this->peek())
        {
            if(array_key_exists($this->peek()['type'],$this->tab))
            {
              $this->finaly = call_user_func($this->tab[$this->peek()['type']]);
            }else {
                throw new Exception('Unexpected type ' . $this->peek()['type'] .'error');
            }
        }
        var_dump($this->finaly);
    }
}