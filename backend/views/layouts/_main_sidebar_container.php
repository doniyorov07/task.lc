<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$route = Yii::$app->controller->route;
$class = 'active';
$menuOpenClass = 'menu-open';

$beginDate = date('01.m.Y');
$endDate = date('t.m.Y');
$isSuperAdmin = Yii::$app->user->can('user');


$sideBarMenus = [

    [
        'label' => Yii::t('app', 'Position'),
        'icon' => 'fas fa-cogs',
        'url' => Url::to(['/position']),
        'active' => in_array($route, ['position/index', 'position/update', 'position/create', 'position/delete']),
        'isVisible' => true,
        'items' => [],
    ],

    [
        'label' => Yii::t('app', 'Employee'),
        'icon' => 'fas fa-cogs',
        'url' => Url::to(['/employee']),
        'active' => in_array($route, ['employee/index', 'employee/update', 'employee/create', 'employee/delete', 'employee/view']),
        'isVisible' => true,
        'items' => [],
    ],

    [
        'label' => Yii::t('app', 'RBAC'),
        'icon' => 'fas fa-chalkboard',
        'url' => '#',
        'isVisible' => true,
        'active' => in_array($route, [
            'rbac/auth-assignment/index', 'rbac/auth-assignment/view', 'rbac/auth-assignment/update', 'rbac/auth-assignment/create', 'rbac/auth-assignment/delete',
            'rbac/auth-item/index', 'rbac/auth-item/view', 'rbac/auth-item/update', 'rbac/auth-item/create', 'rbac/auth-item/delete',
        ]),
        'items' => [
            [
                'label' => Yii::t('app', 'Auth-Assigment'),
                'icon' => 'far fa-circle nav-icon',
                'url' => Url::to(['/rbac/auth-assignment']),
                'isVisible' => true,
                'active' => in_array($route, ['rbac/auth-assignment/index', 'rbac/auth-assignment/view', 'rbac/auth-assignment/update', 'rbac/auth-assignment/create', 'rbac/auth-assignment/delete']),
                'items' => [],
            ],
            [
                'label' => Yii::t('app', 'Auth-Item'),
                'icon' => 'far fa-circle nav-icon',
                'url' => Url::to(['/rbac/auth-item']),
                'isVisible' => true,
                'active' => in_array($route, ['rbac/auth-item/index', 'rbac/auth-item/view', 'rbac/auth-item/update', 'rbac/auth-item/create', 'rbac/auth-item/delete']),
                'items' => [],
            ],
        ]
    ],


    [
        'label' => Yii::t('app', 'Sozlamalar'),
        'icon' => 'fas fa-cogs',
        'url' => Url::to(['/profile-manager']),
        'active' => in_array($route, ['default/change-login', 'default/change-password', 'client/update', 'client/create', 'client/get-money']),
        'isVisible' => true,
        'items' => [],
    ],

];

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['/']) ?>" class="brand-link">
        <img src="<?= Url::base() ?>/adminLte3/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8;width: 29px">
        <span class="brand-text font-weight-light"><?= env('APP_NAME') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= Url::to(['/']) ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php foreach ($sideBarMenus as $sideBarMenu): ?>
                    <?php if ($sideBarMenu['isVisible']): ?>
                        <li class="nav-item <?= $sideBarMenu['active'] ? $menuOpenClass : '' ?>">
                            <a href="<?= $sideBarMenu['url'] ?>"
                               class="nav-link <?= $sideBarMenu['active'] ? $class : '' ?>">
                                <i class="nav-icon <?= $sideBarMenu['icon'] ?>"></i>
                                <p>
                                    <?= $sideBarMenu['label'] ?>
                                    <?php if ($sideBarMenu['items']): ?>
                                        <i class="right fas fa-angle-left"></i>
                                    <?php endif ?>
                                </p>
                            </a>
                            <?php if ($sideBarMenu['items']): ?>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($sideBarMenu['items'] as $item): ?>
                                        <?php if ($item['isVisible']): ?>
                                            <li class="nav-item">
                                                <a href="<?= $item['url'] ?>"
                                                   class="nav-link <?= $item['active'] ? $class : '' ?>">
                                                    <i class="<?= $item['icon'] ?> nav-icon"></i>
                                                    <p><?= $item['label'] ?></p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
