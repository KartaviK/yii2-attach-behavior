<?php

namespace Kartavik\Yii2\Tests\Unit;

use Kartavik\Yii2\Tests\Mock;
use PHPUnit\Framework\TestCase;
use yii\base;

/**
 * Class AttachTest
 * @package Kartavik\Yii2\Tests\Unit
 */
class AttachTest extends TestCase
{
    public function testSuccessValidate(): void
    {
        $model = new Mock\MyModel();

        $model->trigger('test');

        $this->assertTrue(true);
    }

    public function testInvalidObject(): void
    {
        $model = new class extends base\Model
        {
            public function behaviors()
            {
                return [
                    'attach' => [
                        'class' => Mock\Behavior::class
                    ]
                ];
            }
        };

        $this->expectExceptionMessage(
            Mock\Behavior::class . ' can be attached only to [' . Mock\MyModel::class . '] object'
        );
        $this->expectException(base\InvalidArgumentException::class);

        $model->trigger('test');
    }

    public function testFailedValidate(): void
    {
        $model = new Mock\MyModel();

        $this->expectException(base\InvalidConfigException::class);
        $this->expectExceptionMessage('Behavior must have properly configured option attach');

        $model->trigger('invalid');
    }
}
