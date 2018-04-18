<?php
class Lexer {

    private $rules = array();
    private $results = [];

    public function __construct($rules = null){
        $this->rules = $rules;
        // $this->results = $results;
    }


    public function print_code($code) {
        echo $code;
    }


    public function check_rules($code) {

        while ($code) {
            $code = ltrim($code);
            $valid = false;
            foreach ($this->rules as $rule) {
                $pattern = "/^" . $rule[0] . "/";
                $type = $rule[1];
                if (preg_match($pattern, $code, $capture)) {
                    $valid = true;
                    $result = [
                        'type' => $type,
                        'value' => $capture[0],
                    ];
                    array_push($this->results, $result);
                    $code = substr($code, strlen($capture[0]));
                    break;
                }
            }
            if(!$valid) {
                exit("Unable to find a rule for : " . $code);
            }
        }
        return $this->results;
    }
}