<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link <?= $this->setActiveClass(["index"]) ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><?= $tempDict["main"] ?></p>
                    </a>
                </li>
                
                <li class="nav-item has-treeview <?= $this->setMenuOpen(["products", "productscategories"]) ?>">
                    <a href="#" class="nav-link <?= $this->setActiveClass(["products", "productscategories"]) ?>">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            <?= $tempDict["store"] ?><i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/products" class="nav-link <?= $this->setActiveClass(["products"]) ?>">
                                <i class="far fa-boxes nav-icon"></i>
                                <p><?= $tempDict["products"] ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/productscategories" class="nav-link <?= $this->setActiveClass(["productscategories"]) ?>">
                                <i class="fas fa-box-check nav-icon"></i>
                                <p><?= $tempDict["products_categories"] ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/clients" class="nav-link <?= $this->setActiveClass(["clients"]) ?>">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            <?= $tempDict["clients"] ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/suppliers" class="nav-link <?= $this->setActiveClass(["suppliers"]) ?>">
                        <i class="nav-icon fas fa-parachute-box"></i>
                        <p>
                            <?= $tempDict["suppliers"] ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= $this->setMenuOpen(["users", "privileges", "usersgroups"]) ?>">
                    <a href="#" class="nav-link <?= $this->setActiveClass(["users", "privileges", "usersgroups"]) ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            <?= $tempDict["users_settings"] ?><i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users" class="nav-link <?= $this->setActiveClass(["users"]) ?>">
                                <i class="far fa-users nav-icon"></i>
                                <p><?= $tempDict["users"] ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/privileges" class="nav-link <?= $this->setActiveClass(["privileges"]) ?>">
                                <i class="far fa-users-medical nav-icon"></i>
                                <p><?= $tempDict["users_privileges"] ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/usersgroups" class="nav-link <?= $this->setActiveClass(["usersgroups"]) ?>">
                                <i class="fas fa-users-class nav-icon"></i>
                                <p><?= $tempDict["users_groups"] ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            <?= $tempDict["logout"] ?>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>