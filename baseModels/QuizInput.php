<?php

namespace common\modules\quiz\baseModels;

use Yii;

/**
 * This is the model class for table "quiz_input".
 *
 * @property integer $id
 * @property string $name
 * @property string $var_name
 * @property string $type
 * @property integer $is_open_question
 * @property string $question
 * @property string $answer_explanation
 * @property integer $shuffle_options
 * @property integer $sort_order
 * @property integer $options_per_row
 * @property integer $options_per_small_row
 * @property integer $quiz_input_group_id
 *
 * @property QuizInputGroup $quizInputGroup
 * @property QuizInputImage[] $quizInputImages
 * @property QuizInputOption[] $quizInputOptions
 * @property QuizInputToInputValidator[] $quizInputToInputValidators
 * @property QuizInputValidator[] $quizInputValidators
 */
class QuizInput extends QuizBase
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz_input';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'var_name', 'type', 'quiz_input_group_id'], 'required'],
            [['is_open_question', 'shuffle_options', 'sort_order', 'options_per_row', 'options_per_small_row', 'quiz_input_group_id'], 'integer'],
            [['question', 'answer_explanation'], 'string'],
            [['name', 'var_name', 'type'], 'string', 'max' => 255],
            [['quiz_input_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuizInputGroup::className(), 'targetAttribute' => ['quiz_input_group_id' => 'id'], 'except' => 'test'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'var_name' => 'Var Name',
            'type' => 'Type',
            'is_open_question' => 'Is Open Question',
            'question' => 'Question',
            'answer_explanation' => 'Answer Explanation',
            'shuffle_options' => 'Shuffle Options',
            'sort_order' => 'Sort Order',
            'options_per_row' => 'Options Per Row',
            'options_per_small_row' => 'Options Per Small Row',
            'quiz_input_group_id' => 'Quiz Input Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizInputGroup()
    {
        return $this->hasOne(QuizInputGroup::className(), ['id' => 'quiz_input_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizInputImages()
    {
        return $this->hasMany(QuizInputImage::className(), ['quiz_input_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizInputOptions()
    {
        return $this->hasMany(QuizInputOption::className(), ['quiz_input_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizInputToInputValidators()
    {
        return $this->hasMany(QuizInputToInputValidator::className(), ['quiz_input_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizInputValidators()
    {
        return $this->hasMany(QuizInputValidator::className(), ['id' => 'quiz_input_validator_id'])->viaTable('quiz_input_to_input_validator', ['quiz_input_id' => 'id']);
    }
}
