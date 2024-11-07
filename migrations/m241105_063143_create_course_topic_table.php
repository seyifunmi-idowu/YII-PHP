<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_topic}}`.
 */
class m241105_063143_create_course_topic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('course_topic', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('course_topic');
    }
}
