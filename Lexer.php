<?php


class Lexer {

    public $rules = [
        [ 'if', 'IF' ],
        [ '\(', 'LEFT_PAREN' ],
        [ '\)', 'RIGHT_PAREN' ],
        [ '\{', 'LEFT_BRACE' ],
        [ '\}', 'RIGHT_BRACE' ],
        [ '\d+', 'INTEGER' ],
        [ '\;' , 'POINT_VIRGULE'],
        [ 'function', 'FUNCTION'],
        [ 'end', 'END'],
        [ 'return', 'RETURN'],
    ];
    public $result = [];



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
                    $code = substr($code, strlen($capture[0]));
                    break;
                }
            }
            if(!$valid) {
                exit("Unable to find a rule for : " . $code);
            }
            // var_export($result);
        }
    }
}