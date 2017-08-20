<?php

use yii\db\Migration;

/**
 * Handles adding image_id to table `quiz_input`.
 * Has foreign keys to the tables:
 *
 * - `image`
 */
class m170820_060759_add_image_id_column_to_quiz_input_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('quiz_input', 'image_id', $this->integer());

        // creates index for column `image_id`
        $this->createIndex(
            'idx-quiz_inp-image_id',
            'quiz_input',
            'image_id'
        );

        // add foreign key for table `image`
        $this->addForeignKey(
            'fk-quiz_inp-image_id',
            'quiz_input',
            'image_id',
            'image',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `image`
        $this->dropForeignKey(
            'fk-quiz_inp-image_id',
            'quiz_input'
        );

        // drops index for column `image_id`
        $this->dropIndex(
            'idx-quiz_inp-image_id',
            'quiz_input'
        );

        $this->dropColumn('quiz_input', 'image_id');
    }
}
