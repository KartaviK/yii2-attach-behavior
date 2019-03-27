<?php

namespace Kartavik\Yii2\Tests\Mock;

use yii\base\Model;

/**
 * Class MyModel
 * @package Kartavik\Yii2\Tests\Mock
 */
class MyModel extends Model
{
    public function behaviors(): array
    {
        return [
            'attach' =>  Behavior::class,
            'invalid' => InvalidBehavior::class,
        ];
    }
}
