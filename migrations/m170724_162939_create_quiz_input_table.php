<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quiz_input`.
 * Has foreign keys to the tables:
 *
 * - `quiz_input_group`
 */
class m170724_162939_create_quiz_input_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('quiz_input', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'var_name' => $this->string()->notNull(),
            'type' => $this->string()->notNull(),
            'question' => $this->text(),
            'answer' => $this->text(),
            'sort_order' => $this->integer(),
            'options_per_row' => $this->integer(),
            'options_per_small_row' => $this->integer(),
            'quiz_input_group_id' => $this->integer()->notNull(),
        ], $tableOptions);

        // creates index for column `quiz_input_group_id`
        $this->createIndex(
            'idx-quiz_inp-quiz_inp_group_id',
            'quiz_input',
            'quiz_input_group_id'
        );

        // add foreign key for table `quiz_input_group`
        $this->addForeignKey(
            'fk-quiz_inp-quiz_inp_group_id',
            'quiz_input',
            'quiz_input_group_id',
            'quiz_input_group',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `quiz_input_group`
        $this->dropForeignKey(
            'fk-quiz_inp-quiz_inp_group_id',
            'quiz_input'
        );

        // drops index for column `quiz_input_group_id`
        $this->dropIndex(
            'idx-quiz_inp-quiz_inp_group_id',
            'quiz_input'
        );

        $this->dropTable('quiz_input');
    }
}
