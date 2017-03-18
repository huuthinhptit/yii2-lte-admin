<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Story */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('story', 'Stories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="story-view">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">story</h3>
                </div>
                <div class="box-body">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <p>
                        <?= Html::a(Yii::t('story', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('story', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => Yii::t('story', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                        ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                                'id',
            'title',
            'icon',
            'chap_id',
            'author',
            'comment_id',
            'created_at',
            'updated_at',
            'status',
                    ],
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</div>
