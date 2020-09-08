<?php


namespace App\Interfaces;


interface GameInterface
{

    const PAY_LINES = [
        [0, 3, 6, 9, 12],
        [1, 4, 7, 10, 13],
        [2, 5, 8, 11, 14],
        [0, 4, 8, 10, 12],
        [2, 4, 6, 10, 14]
    ];
    //Percentage over bet value
    const PAY_VALUES = [
        3 => 0.20,
        4 => 2,
        5 => 10
    ];

    const DEFAULT_BET_VALUE = 100;

    function getBoard();
    function getPossiblePayLines();
    function getBetAmount();

}