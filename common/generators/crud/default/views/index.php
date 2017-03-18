<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use common\models\BaseModel;
use <?= $generator->indexWidgetType === 'grid' ? "kartik\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <?php if (!empty($generator->searchModelClass)): ?>
        <?= "<?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php endif; ?>
    <div class="box">
        <div class="box-body">
            <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>
            <p>
                <?= "<?= " ?>Html::a(<?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= $generator->enablePjax ? '<?php Pjax::begin(); ?>' : '' ?>
            <?php if ($generator->indexWidgetType === 'grid'): ?>
                <!--sum-->
                <?= "<?php " ?>$fileName="<?php echo Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>"<?= "?>\n\n" ?>
                <?php $tableName = $generator->getTableSchema();
                if (isset($tableName->columns['amount'])) { ?>
                    <?= "<?php\n " ?>
                    if(count($dataProvider->getModels())>0){
                    $amountProvider = new \yii\data\ActiveDataProvider($dataProvider);
                    $amountProvider->setPagination(false);
                    $totalAmount = BaseModel::pageTotal($amountProvider->models, 'amount');
                    }else{
                    $totalAmount = 0;
                    }
                    <?= "?>" ?>
                <?php } ?>
                <!--sum-->
                <?= "<?= " ?>GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'pjaxSettings' => [
                'options' => ['id' => 'kv-pjax-container'],
                <?php
                if(isset($tableName->columns['amount'])){?>
                    'beforeGrid' => '<h3> Total Amount = ' . Yii::$app->formatter->asDecimal($totalAmount) . '</h3>'
                <?php }?>
                ],
                'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-credit-card"></i> <?= Inflector::camel2words(StringHelper::basename($generator->modelClass))?></h3>',
                ],

                <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n                'columns' => [\n" : "'                columns' => [\n"; ?>
                ['class' => 'kartik\grid\SerialColumn'],

                <?php
                $count = 0;
                if (($tableSchema = $generator->getTableSchema()) === false) {
                    foreach ($generator->getColumnNames() as $name) {
                        if (++$count < 6) {
                            echo "                        '" . $name . "',\n";
                        } else {
                            echo "                        // '" . $name . "',\n";
                        }
                        if ($name == 'amount') {

                        }
                    }
                } else {
                    foreach ($tableSchema->columns as $column) {
                        $format = $generator->generateColumnFormat($column);
                        if (++$count < 6) {
                            echo "                        '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                        } else {
                            echo "                        // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                        }
                        if ($column->name == 'amount') {
                            echo "                        [\n                            'attribute'=>'" . $column->name . "',\n                           'format' => ['decimal', 0],\n                            'pageSummary' => true,\n                            'pageSummaryFunc' => GridView::F_SUM\n                        ],\n";
                        }

                    }
                }
                ?>

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
            <?php else: ?>
                <?= "<?= " ?>ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                },
                ]) ?>
            <?php endif; ?>
            <?= $generator->enablePjax ? '<?php Pjax::end(); ?>\n' : '' ?>
        </div>
    </div>
</div>
