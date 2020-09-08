# Slot game
## How to run

### Pre-requisites
- PHP 7
- Composer

### Setup

Clone this repo and run the following commands, in the given order:

1. `composer install`
2. `php artisan game:play`

Result example:

```
{
    "board": "[Cat, K, Bir, 9, K, Bir, Bir, Q, J, 10, Bir, K, J, Mon, Cat]",
    "bet_amount": 100,
    "paylines": {
        "2 4 6 10 14": 3
    },
    "total_win": 20
}
```