<?php

namespace zafarjonovich\YiiSafeException\base;

use yii\base\BaseObject;

abstract class Saver extends BaseObject
{
    abstract public function save($convertedException);
}