<?php


namespace App\Interfaces;


interface BoardInterface
{
    const BOARD_SETUP = [
        [0, 3, 6, 9, 12],
        [1, 4, 7, 10, 13],
        [2, 5, 8, 11, 14]
    ];

    const POSSIBLE_VALUES = [ "9", "10", "J", "Q", "K", "A","Cat", "Mon", "Bir" ];

    function getBoardValues();

}