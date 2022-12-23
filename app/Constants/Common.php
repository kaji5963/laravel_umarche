<?php

namespace App\Constants;

class Common
{
    const PRODUCT_ADD = '1'; //増加
    const PRODUCT_REDUCE = '2'; //削減

    const PRODUCT_LIST = [
        'add' => self::PRODUCT_ADD,
        'reduce' => self::PRODUCT_REDUCE,
    ];
}