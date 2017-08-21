<?php

use yii\db\Migration;

/**
 * Handles adding timeout_handling_column_inputs_auto_next to table `quiz_input_group`.
 */
class m170821_092832_add_timeout_handling_column_inputs_auto_next_column_to_quiz_input_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('quiz_input_group', 'timeout_handling', $this->string()->after('duration'));
        $this->addColumn('quiz_input_group', 'inputs_auto_next', $this->smallInteger(1)->after('inputs_appearance'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('quiz_input_group', 'timeout_handling');
        $this->dropColumn('quiz_input_group', 'inputs_auto_next');
    }
}
