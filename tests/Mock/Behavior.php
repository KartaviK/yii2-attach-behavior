<?php

namespace Kartavik\Yii2\Tests\Mock;

use Kartavik\Yii2\Behaviors\Attach;
use yii\base;

/**
 * Class Behavior
 * @package Kartavik\Yii2\Tests\Mock
 *
 * @method MyModel extractSender(base\Event $event)
 */
class Behavior extends Attach
{
    public function events()
    {
        return [
            'test' => 'execute'
        ];
    }

    protected function attachTo(): string
    {
        return MyModel::class;
    }

    public function execute(base\Event $event)
    {
        return $this->extractSender($event);
    }
}
