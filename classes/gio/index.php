<?php

    /*
    #working with classes
    declare(strict_types=1);

    require_once 'Transaction.php';

    $transaction = (new Transaction(100, 'Transaction 1'))
            ->addTax(8)
            ->applyDiscount(10);

    $amount = $transaction->getAmount();

    var_dump($amount);
    */
// ==========================================
    /*
    # converting std class to array
    $srt = '{"a":1,"b":2,"c":3}';

    $arr = json_decode($srt);

    var_dump($arr->c);

    */
//===========================================
    /*
    #creating an std class
    $obj = new \stdClass();

    $obj->a = 1;
    $obj->b = 2;

    var_dump($obj);
    */

    #Converting array to object (casting)

    $arr = [1, 2,3];
    $obj = (object) $arr;

    var_dump($obj->{1});