<?php


namespace zafarjonovich\YiiSafeException\application;

use zafarjonovich\PHPSafeException\base\Converter;
use zafarjonovich\YiiSafeException\base\Saver;

class Console extends \yii\console\ErrorHandler
{
    public $stringGeneratorClass;

    public $prettyException = false;

    public $showTraceArgs = false;

    public $traceLevel = 1;

    public $savers = [];

    private function saveSafeException($exception)
    {
        try{
            $class = $this->stringGeneratorClass;

            /**
             * @var Converter $converter
             */
            $converter = new $class($exception,$this->traceLevel);

            if ($this->showTraceArgs)
                $stringGenerator->showTraceArgs();

            if ($this->prettyException && method_exists($converter,'pretty')) {
                $converter->pretty();
            }

            $convertedException = $converter->convert();

            foreach ($this->savers as $saver) {
                /**
                 * @var Saver $saver
                 */
                $saver = \Yii::createObject($saver);

                $saver->save($convertedException);
            }

        }catch (\Exception $otherException){
        }
    }

    protected function renderException($exception)
    {
        $this->saveSafeException($exception);

        parent::renderException($exception);
    }
}