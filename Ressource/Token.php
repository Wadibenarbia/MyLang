<?php


$rules = [
    [ 'if', 'IF' ],
    [ '\(', 'LEFT_PAREN' ],
    [ '\)', 'RIGHT_PAREN' ],
    [ '\{', 'LEFT_BRACE' ],
    [ 'RETURN', 'RETURN'],
    [ '\}', 'RIGHT_BRACE' ],
    [ '\d+', 'INTEGER' ],
    ['PRINT', 'PRINT'],
    [ '\;' , 'SEMICOLON'],
    [ 'function', 'FUNCTION'],
    ['§', 'VARIABLE'],
    ['\w+', 'STRING'],
    [',', 'SEPARATOR'],
    ['=','EGAL'],
    ['<|>|=', 'COMPARE'],
];


$tab_func = array (
    'IF'    => "Parser::parse_if",
    'FUNCTION' => 'Parser::parse_func',
    'VARIABLE' => 'Parser::parse_var',
    'PRINT' => 'Parser::parse_print',
    'RETURN' => 'Parser::parse_return'
);