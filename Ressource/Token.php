<?php


$rules = [
    [ 'if', 'IF' ],
    [ '\(', 'LEFT_PAREN' ],
    [ '\)', 'RIGHT_PAREN' ],
    [ '\{', 'LEFT_BRACE' ],
    [ '\}', 'RIGHT_BRACE' ],
    [ '\d+', 'INTEGER' ],
    [ '\;' , 'SEMICOLON'],
    [ 'function', 'FUNCTION'],
    [ 'return', 'RETURN'],
    ['else', 'ELSE'],
    ['^§+[\w]+', 'VARIABLE'],
    ['^[=]+[\w+]+', 'DECLARE'],
    ['\w+', 'STRING'],
    [',', 'SEPARATOR'],
];


$tab_func = array (
    'PRINT' => 'Parser::parse_statement',
    'IF'    => "Parser::parse_if",
    'FUNCTION' => 'Parser::parse_func',
    'VARIABLE' => 'Parser::parse_var'
);