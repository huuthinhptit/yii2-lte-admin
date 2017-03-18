<?php

use yii\helpers\Html;
use common\models\BaseModel;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\StorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('story', 'Stories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="story-index">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="box">
        <div class="box-body">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a(Yii::t('story', 'Create Story'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?php Pjax::begin(); ?>                            <!--sum-->
                <?php $fileName="story"?>

                                <!--sum-->
                <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'pjaxSettings' => [
                'options' => ['id' => 'kv-pjax-container'],
                                ],
                'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-credit-card"></i> Story</h3>',
                ],

                'filterModel' => $searchModel,
                'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],

                                        'id',
                        'title',
                        'icon',
                        'chap_id',
                        'author',
                        // 'comment_id',
                        // 'created_at',
                        // 'updated_at',
                        // 'status',

                ['class' => 'kartik\grid\ActionColumn'],
                ],
                'showPageSummary' => true,
                'export' => [
                'showConfirmAlert' => false,
                'target' => GridView::TARGET_BLANK,
                ],
                'exportConfig' => [
                GridView::CSV => [
                'filename' => $fileName,
                ],
                GridView::PDF => [
                'filename' => $fileName,
                ],
                GridView::EXCEL => [
                'filename' => $fileName,
                ],
                ],
                ]); ?>
                        <?php Pjax::end(); ?>\n        </div>
    </div>
</div>
