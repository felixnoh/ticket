<?php

use yii\db\Migration;

/**
 * Class m180208_134851_tablas
 */
class m180208_134851_tablas extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('migrations/m180208_134851_tablas.sql')));

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180208_134851_tablas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180208_134851_tablas cannot be reverted.\n";

        return false;
    }
    */
}
