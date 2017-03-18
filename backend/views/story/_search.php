<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\field\FieldRange;
/* @var $this yii\web\View */
/* @var $model common\models\StorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="story-search">
    <div class="box">
        <div class="box-body">
            <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            ]); ?>

                        <div class='row'>

                 <div class="col-md-3">
                     <?= $form->field($model, 'id') ?>
                </div>

                 <div class="col-md-3">
                     <?= $form->field($model, 'title') ?>
                </div>

                 <div class="col-md-3">
                     <?= $form->field($model, 'icon') ?>
                </div>

                 <div class="col-md-3">
                     <?= $form->field($model, 'chap_id') ?>
                </div>

            </div>
            <div class='row'>

                 <div class="col-md-3">
                     <?= $form->field($model, 'author') ?>
                </div>

                 <div class="col-md-3">
                     <?= $form->field($model, 'comment_id') ?>
                </div>

                 <div class="col-md-3">
                     <?= $form->field($model, 'created_at') ?>
                </div>

                 <div class="col-md-3">
                     <?= $form->field($model, 'updated_at') ?>
                </div>

            </div>
            <div class='row'>

                 <div class="col-md-3">
                     <?= $form->field($model, 'status') ?>
                </div>

            </div>
            <div class='row'>
                <div class="col-md-4">
       
                    <?= FieldRange::widget([
                            'form' => $form,
                            'model' => $model,
                            'label' => 'Khoảng thời gian',
                            'attribute1' => 'startTime',
                            'attribute2' => 'endTime',
                            'type' => FieldRange::INPUT_DATE,
                            'fieldConfig1' => ['addon' => [
                                'prepend' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>'],
                                //'append' => ['content'=>'.txt']
                            ]],
                            'fieldConfig2' => ['addon' => [
                                'prepend' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>'],
                                //'append' => ['content'=>'.txt']
                            ]],
                            'widgetOptions1' => [
                                'pluginOptions' => ['autoclose' => true,'format' => 'dd-mm-yyyy'],
                            ],
                            'widgetOptions2' => [
                                'pluginOptions' => ['autoclose' => true,'format' => 'dd-mm-yyyy'],
                            ],
                    ]);
                        ?>
                </div>

             </div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('story', 'Search'), ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton(Yii::t('story', 'Reset'), ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>
