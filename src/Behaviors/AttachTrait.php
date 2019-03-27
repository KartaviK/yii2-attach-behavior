<?php

declare(strict_types=1);

namespace Kartavik\Yii2\Behaviors;

use yii\base;

/**
 * Trait AttachTrait
 * @package Kartavik\Yii2\Behaviors
 */
trait AttachTrait
{
    /**
     * Returns the name of the object that this behavior can be attached to.
     *
     * @return string
     */
    abstract protected function attachTo(): string;

    /**
     * @param base\Event $event
     *
     * @return object
     * @throws base\InvalidConfigException
     */
    protected function extractSender(base\Event $event): object
    {
        $attachObject = $this->attachTo();

        if (!$this->isValidObjectName($attachObject)) {
            throw new base\InvalidConfigException('Behavior must have properly configured option attach');
        }

        if (!$event->sender instanceof $attachObject) {
            throw new base\InvalidArgumentException(
                static::class . " can be attached only to [{$attachObject}] object"
            );
        }

        return $event->sender;
    }

    private function isValidObjectName(string $value): bool
    {
        return !empty($value) && \class_exists($value);
    }
}
