<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\quiz\models\QuizFn */

$this->title = 'Update Quiz Fn: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Quiz Fns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quiz-fn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
