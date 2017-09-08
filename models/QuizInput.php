<?php

namespace common\modules\quiz\models;

use Yii;
use yii\helpers\ArrayHelper;

class QuizInput extends \common\modules\quiz\baseModels\QuizInput
{
    public static function modelConfig()
    {
        $modelConfig = parent::modelConfig();

        $modelConfig['attrs'][] = [
            'type' => 'CheckboxGroup',
            'name' => 'quiz_input_validator_ids',
            'label' => 'Quiz input validators',
            'value' => [],
            'errorMsg' => '',
            'options' => '@list QuizInputValidator',
            'rules' => [],
        ];

        foreach ($modelConfig['attrs'] as &$attr) {
            $newAttr = $attr;
            switch ($newAttr['name']) {
                case 'type':
                    $newAttr['type'] = 'Select';
                    $newAttr['options'] = [
                        // Limited answers types
                        [
                            'value' => 'Limited-answers Types:',
                            'disabled' => true,
                        ],
                        'RadioGroup',
                        'CheckboxGroup',
                        'Select',
                        'WordGuessing',
                        'ImageMapCheckpointOne',
                        'ImageMapCheckpointMany',
                        // Unlimited answers types:
                        [
                            'value' => 'Unlimited-answers Types:',
                            'disabled' => true,
                        ],
                        'Text',
                        'Number',
                        'Date',
                        'Datetime',
                    ];
                    $newAttr['defaultValue'] = 'RadioGroup';
                    break;
                case 'name':
                    $newAttr['defaultValue'] = 'Input @i{QuizInput}';
                    break;
                case 'var_name':
                    $newAttr['defaultValue'] = 'input_@i{QuizInput}';
                    break;
                case 'required':
                case 'auto_next':
                    $newAttr['defaultValue'] = 1;
                    break;

            }
            $attr = $newAttr;
        }

        return $modelConfig;
    }
}
