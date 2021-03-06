<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::home()?>" class="brand-link" target="_blank">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->getUser()->getIdentity()->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/admin/'])?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Статистика магазина
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Заказы
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['order/index'])?>" class="nav-link">
                                <i class="fas fa-table-tennis nav-icon"></i>
                                <p>Список заказов</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['order/create'])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить заказ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>
                            Категории
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['category/index'])?>" class="nav-link">
                                <i class="fas fa-table-tennis nav-icon"></i>
                                <p>Список категорий</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['category/create'])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить категорию</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ion ion-stats-bars"></i>
                        <p>
                            Товары
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['product/index'])?>" class="nav-link">
                                <i class="fas fa-table-tennis nav-icon"></i>
                                <p>Список товаров</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['product/create'])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить товар</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>