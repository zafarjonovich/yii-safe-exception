<?php

namespace zafarjonovich\YiiSafeException\models;


/**
 * This is the model class for table "state".
 *
 * @property int $id
 * @property int $exception
 * @property int $created_at
 */

class YiiDBSafeException extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii-db-safe-exception';
    }
}
