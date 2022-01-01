<?php


namespace zafarjonovich\YiiSafeException\application;

class Web extends \yii\web\ErrorHandler
{
    protected function renderException($exception)
    {
        try{
        }catch (\Exception $exception){
        }

        parent::renderException($exception);
    }
}