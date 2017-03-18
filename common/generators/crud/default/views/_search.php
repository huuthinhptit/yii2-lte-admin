<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\field\FieldRange;
/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">
    <div class="box">
        <div class="box-body">
            <?= "<?php " ?>$form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            ]); ?>

            <?php

            $count = 0;
            $onePage = 0;
            $totalColurm = count($generator->getColumnNames());
            $page = ceil((int)$totalColurm / 4);

            for($i=0; $i<$page;$i++){
                echo "            <div class='row'>\n\n";
                foreach (array_slice($generator->getColumnNames(),$i*4,4,true) as $attribute) {
                    echo "                 <div class=\"col-md-3\">\n                     <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n                </div>\n\n";
                }
                echo "            </div>\n";
            }
            echo "            <div class='row'>\n";
            echo "                <div class=\"col-md-4\">\n       
                    <?= FieldRange::widget([
                            'form' => \$form,
                            'model' => \$model,
                            'label' => 'Khoảng thời gian',
                            'attribute1' => 'startTime',
                            'attribute2' => 'endTime',
                            'type' => FieldRange::INPUT_DATE,
                            'fieldConfig1' => ['addon' => [
                                'prepend' => ['content' => '<i class=\"glyphicon glyphicon-calendar\"></i>'],
                                //'append' => ['content'=>'.txt']
                            ]],
                            'fieldConfig2' => ['addon' => [
                                'prepend' => ['content' => '<i class=\"glyphicon glyphicon-calendar\"></i>'],
                                //'append' => ['content'=>'.txt']
                            ]],
                            'widgetOptions1' => [
                                'pluginOptions' => ['autoclose' => true,'format' => 'dd-mm-yyyy'],
                            ],
                            'widgetOptions2' => [
                                'pluginOptions' => ['autoclose' => true,'format' => 'dd-mm-yyyy'],
                            ],
                    ]);
                        ?>\n                </div>\n\n ";
            echo "            </div>\n";
            ?>
            <div class="form-group">
                <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Search') ?>, ['class' => 'btn btn-primary']) ?>
                <?= "<?= " ?>Html::resetButton(<?= $generator->generateString('Reset') ?>, ['class' => 'btn btn-default']) ?>
            </div>

            <?= "<?php " ?>ActiveForm::end(); ?>
        </div>
    </div>


</div>
