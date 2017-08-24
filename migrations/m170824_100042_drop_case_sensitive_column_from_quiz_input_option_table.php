<?php

use yii\db\Migration;

/**
 * Handles dropping case_sensitive from table `quiz_input_option`.
 */
class m170824_100042_drop_case_sensitive_column_from_quiz_input_option_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('quiz_input_option', 'case_sensitive');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('quiz_input_option', 'case_sensitive', $this->smallInteger(1)->after('correct'));
    }
}
