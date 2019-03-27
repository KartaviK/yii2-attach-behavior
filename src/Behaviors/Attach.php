<?php

declare(strict_types=1);

namespace Kartavik\Yii2\Behaviors;

use yii\base;

/**
 * Class Attach
 * @package Kartavik\Yii2\Behaviors
 */
abstract class Attach extends base\Behavior
{
    use AttachTrait;
}
