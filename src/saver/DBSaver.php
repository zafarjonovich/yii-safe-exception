<?php


namespace zafarjonovich\YiiSafeException\saver;

use zafarjonovich\YiiSafeException\models\YiiDBSafeException;
use zafarjonovich\YiiSafeException\base\Saver;

class DBSaver extends Saver
{
    public function save($convertedException)
    {
        $dbException = new YiiDBSafeException();
        $dbException->exception = $convertedException;
        $dbException->created_at = date('Y-m-d H:i:s');
        $dbException->save(false);
    }
}