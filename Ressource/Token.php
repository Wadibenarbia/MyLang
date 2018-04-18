<?php


// $parser = array (
//     array (
//         'type' => 'IF',
//         'value' => 'if',
//     ),
//     array (
//         'type' => 'LEFT_PAREN',
//         'value' => '(',
//     ),
//     array (
//         'type' => 'INTEGER',
//         'value' => '1',
//     ),
//     array (
//         'type' => 'RIGHT_PAREN',
//         'value' => ')',
//     ),
//     array (
//         'type' => 'LEFT_BRACE',
//         'value' => '{',
//         ),
//     array (
//         'type' => 'PRINT',
//         'value' => 'PRINT',
//         ),
//     array (
//         'type' => 'STRING',
//         'value' => 'Hello world',
//         ),
//     array (
//         'type' => 'SEMICOLON',
//         'value' => ';',
//     ),
//     array (
//         'type' => 'RIGHT_BRACE',
//         'value' => '}',
//     ),
// );


$rules = [
    [ 'if', 'IF' ],
    [ '\(', 'LEFT_PAREN' ],
    [ '\)', 'RIGHT_PAREN' ],
    [ '\{', 'LEFT_BRACE' ],
    [ '\}', 'RIGHT_BRACE' ],
    [ '\d+', 'INTEGER' ],
    [ '\;' , 'POINT_VIRGULE'],
    [ 'function', 'FUNCTION'],
    [ 'return', 'RETURN']
];