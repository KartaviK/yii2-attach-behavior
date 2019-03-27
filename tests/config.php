<?php

use yii\helpers\ArrayHelper;

$localConfig = __DIR__ . DIRECTORY_SEPARATOR . 'config-local.php';
$config = [
    'id' => 'yii2-attach-behavior',
    'basePath' => \dirname(__DIR__),
];
return ArrayHelper::merge(
    $config,
    \is_file($localConfig) ? require $localConfig : []
);
