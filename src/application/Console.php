<?php


namespace zafarjonovich\YiiSafeException\application;


class Console extends \yii\console\ErrorHandler
{
    protected function renderException($exception)
    {
        parent::renderException($exception);
    }
}