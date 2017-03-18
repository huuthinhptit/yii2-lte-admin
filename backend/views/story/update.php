<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Story */

$this->title = Yii::t('story', 'Update {modelClass}: ', [
    'modelClass' => 'Story',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('story', 'Stories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('story', 'Update');
?>
<div class="story-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
