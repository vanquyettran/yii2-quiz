<?php

namespace common\modules\quiz\baseModels;

use Yii;

/**
 * This is the model class for table "quiz_input_option".
 *
 * @property integer $id
 * @property string $value
 * @property string $content
 * @property integer $score
 * @property integer $correct
 * @property integer $case_sensitive
 * @property integer $quiz_duration_change
 * @property integer $input_group_duration_change
 * @property integer $quiz_time_speed_change
 * @property integer $input_group_time_speed_change
 * @property string $explanation
 * @property integer $sort_order
 * @property integer $quiz_input_id
 * @property integer $repeat_count
 *
 * @property QuizInput $quizInput
 * @property QuizInputOptionToVotedResult[] $quizInputOptionToVotedResults
 * @property QuizResult[] $quizVotedResults
 */
class QuizInputOption extends QuizBase
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz_input_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'quiz_input_id'], 'required'],
            [['content', 'explanation'], 'string'],
            [['score', 'correct', 'case_sensitive', 'quiz_duration_change', 'input_group_duration_change', 'quiz_time_speed_change', 'input_group_time_speed_change', 'sort_order', 'quiz_input_id', 'repeat_count'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['quiz_input_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuizInput::className(), 'targetAttribute' => ['quiz_input_id' => 'id'], 'except' => 'test'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'content' => 'Content',
            'score' => 'Score',
            'correct' => 'Correct',
            'case_sensitive' => 'Case Sensitive',
            'quiz_duration_change' => 'Quiz Duration Change',
            'input_group_duration_change' => 'Input Group Duration Change',
            'quiz_time_speed_change' => 'Quiz Time Speed Change',
            'input_group_time_speed_change' => 'Input Group Time Speed Change',
            'explanation' => 'Explanation',
            'sort_order' => 'Sort Order',
            'quiz_input_id' => 'Quiz Input ID',
            'repeat_count' => 'Repeat Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizInput()
    {
        return $this->hasOne(QuizInput::className(), ['id' => 'quiz_input_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizInputOptionToVotedResults()
    {
        return $this->hasMany(QuizInputOptionToVotedResult::className(), ['quiz_input_option_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizVotedResults()
    {
        return $this->hasMany(QuizResult::className(), ['id' => 'quiz_voted_result_id'])->viaTable('quiz_input_option_to_voted_result', ['quiz_input_option_id' => 'id']);
    }
}
