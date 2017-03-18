<?php
use backend\assets\AdminLtePluginAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AdminLtePluginAsset::register($this);
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?php
        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Story', 'icon' => 'fa fa-inbox', 'url' => ['/story']],
                    [
                        'label' => 'System', 'icon' => 'glyphicon glyphicon-cog', 'url' => ['#'],
                        'items' => [
                            ['label' => Yii::t('menu', 'Manage users'), 'url' => ['/user/admin/index'],],
                            ['label' => Yii::t('menu', 'Manage assignment'), 'url' => ['/admin/assignment'],],
                            ['label' => Yii::t('menu', 'Manage role'), 'url' => ['/admin/role'],],
                            ['label' => Yii::t('menu', 'Manage permission'), 'url' => ['/admin/permission'],],
                            ['label' => Yii::t('menu', 'Manage Route'), 'url' => ['/admin/route'],],
                            ['label' => Yii::t('menu', 'Manage Rule'), 'url' => ['/admin/rule'],],
                        ],
                    ],
                ],

            ]
        )
        ?>

    </section>

</aside>
