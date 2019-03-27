<?php

namespace Kartavik\Yii2\Tests\Mock;

use Kartavik\Yii2\Behaviors\Attach;
use yii\base\Event;

/**
 * Class InvalidBehavior
 * @package Kartavik\Yii2\Tests\Mock
 */
class InvalidBehavior extends Attach
{
    public function events()
    {
        return [
            'invalid' => 'execute'
        ];
    }

    protected function attachTo(): string
    {
        return 'invalid-object-name';
    }

    public function execute(Event $event)
    {
        $this->extractSender($event);
    }
}
