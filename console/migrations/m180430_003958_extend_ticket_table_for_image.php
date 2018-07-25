<?php

use yii\db\Migration;

/**
 * Class m180430_003958_extend_ticket_table_for_image
 */
class m180430_003958_extend_ticket_table_for_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
      if ($this->db->driverName === 'mysql') {
          $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
      }
      $this->addColumn('{{%status}}','image_src_filename',Schema::TYPE_STRING.' NOT NULL');
      $this->addColumn('{{%status}}','image_web_filename',Schema::TYPE_STRING.' NOT NULL');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropColumn('{{%status}}','image_src_filename');
        $this->dropColumn('{{%status}}','image_web_filename');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180430_003958_extend_ticket_table_for_image cannot be reverted.\n";

        return false;
    }
    */
}
