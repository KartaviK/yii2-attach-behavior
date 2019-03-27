# Yii2 Attache behavior

Behavior with restriction attach option

## Installation

```bash
composer require kartavik/yii2-attach-behavior
```

## Usage

Create behavior and implement method `attachTo()` that will return name of need object

```php
<?php

class MyBehavior extends \Kartavik\Yii2\Behaviors\Attach
{
    public function events()
    {
        return [
            'some-event' => 'action'
        ];
    }
    
    protected function attachTo(): string
    {
        return MyObject::class;
    }
    
    public function action(\yii\base\Event $event)
    {
        $myObject = $this->extractSender($event);
    }
}
```

If someone will attach behavior to another object - it will throw an invalid argument exception

## License
- [MIT](LICENSE)
