<?php

namespace fredyns\pack;

use Yii;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;

/**
 *
 */
class Bootstrap implements BootstrapInterface
{

    /** @inheritdoc */
    public function bootstrap($app)
    {
        if (!isset($app->get('i18n')->translations['pack*'])) {
            $app->get('i18n')->translations['pack*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => __DIR__.'/messages',
                'sourceLanguage' => 'en-US'
            ];
        }
    }
}