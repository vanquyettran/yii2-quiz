<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quiz_character_medium_to_style`.
 * Has foreign keys to the tables:
 *
 * - `quiz_character_medium`
 * - `quiz_style`
 */
class m170724_163253_create_junction_quiz_character_medium_and_quiz_style_for_quiz_character_medium_and_quiz_style_tables extends Migration
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
        $this->createTable('quiz_character_medium_to_style', [
            'quiz_character_medium_id' => $this->integer(),
            'quiz_style_id' => $this->integer(),
            'style_order' => $this->integer()->notNull(),
            'PRIMARY KEY(quiz_character_medium_id, quiz_style_id)',
        ], $tableOptions);

        // creates index for column `quiz_character_medium_id`
        $this->createIndex(
            'idx-quiz_chr_md_to_style-quiz_chr_md_id',
            'quiz_character_medium_to_style',
            'quiz_character_medium_id'
        );

        // add foreign key for table `quiz_character_medium`
        $this->addForeignKey(
            'fk-quiz_chr_md_to_style-quiz_chr_md_id',
            'quiz_character_medium_to_style',
            'quiz_character_medium_id',
            'quiz_character_medium',
            'id',
            'CASCADE'
        );

        // creates index for column `quiz_style_id`
        $this->createIndex(
            'idx-quiz_chr_md_to_style-quiz_style_id',
            'quiz_character_medium_to_style',
            'quiz_style_id'
        );

        // add foreign key for table `quiz_style`
        $this->addForeignKey(
            'fk-quiz_chr_md_to_style-quiz_style_id',
            'quiz_character_medium_to_style',
            'quiz_style_id',
            'quiz_style',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `quiz_character_medium`
        $this->dropForeignKey(
            'fk-quiz_chr_md_to_style-quiz_chr_md_id',
            'quiz_character_medium_to_style'
        );

        // drops index for column `quiz_character_medium_id`
        $this->dropIndex(
            'idx-quiz_chr_md_to_style-quiz_chr_md_id',
            'quiz_character_medium_to_style'
        );

        // drops foreign key for table `quiz_style`
        $this->dropForeignKey(
            'fk-quiz_chr_md_to_style-quiz_style_id',
            'quiz_character_medium_to_style'
        );

        // drops index for column `quiz_style_id`
        $this->dropIndex(
            'idx-quiz_chr_md_to_style-quiz_style_id',
            'quiz_character_medium_to_style'
        );

        $this->dropTable('quiz_character_medium_to_style');
    }
}
