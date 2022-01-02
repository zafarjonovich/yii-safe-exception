<?php

use yii\db\Migration;
use zafarjonovich\YiiSafeException\models\YiiDBSafeException;

class m211229_191623_create_safe_exception_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(YiiDBSafeException::tableName(), [
            'id' => $this->primaryKey(),
            'exception' => $this->text(),
            'created_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(YiiDBSafeException::tableName());
    }
}
