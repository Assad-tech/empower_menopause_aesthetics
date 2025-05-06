{{-- Sidebar --}}

<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span
                    class="user-avatar user-avatar-lg"><img src="{{ asset('front') }}/assets/images/avatars/profile.jpg"
                        alt=""></span> <span class="account-icon"><span
                        class="fa fa-caret-down fa-lg"></span></span>
                <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span
                        class="account-description">Marketing
                        Manager</span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <!-- dropdown-items -->
                <div class="pb-3">
                    <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span>
                        Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span
                            class="dropdown-icon oi oi-account-logout"></span>
                        Logout</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a
                        class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item"
                        href="#">Keyboard
                        Shortcuts</a>
                </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
        </header><!-- /.aside-header -->


        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
                <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                    <li class="menu-item {{ Route::is('admin.dashboard') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <span class="menu-icon fas fa-home"></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li><!-- /.menu-item -->

                    <!-- .menu-item -->
                    <li class="menu-item {{ Route::is('admin.site-content') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.site-content') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">Site Content</span>
                        </a>
                    </li>

                    <!-- .menu-item -->
                    <li class="menu-item {{ Route::is('admin.social-links') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.social-links') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">Social Links</span>
                        </a>
                    </li>

                    <!-- .menu-item -->
                    <li class="menu-item {{ Route::is('admin.banners') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.banners') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">Banners</span>
                        </a>
                    </li>

                    <!-- .menu-item -->
                    <li class="menu-item {{ Route::is('admin.manage.home') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.manage.home') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">Testimonials</span>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('admin.manage.about-us') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.manage.about-us') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">About Us</span>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('admin.manage.services') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.manage.services') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">Services</span>
                        </a>
                    </li>
                    {{-- Products --}}
                    <li
                        class="menu-item has-child {{ Route::is('admin.manage.categories', 'admin.manage.products','admin.manage.orders') ? 'has-active' : '' }}">
                        <a href="#" class="menu-link">
                            <span class="menu-icon oi oi-list-rich"></span>
                            <span class="menu-text">Products</span>
                        </a>

                        <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-subhead">Products</li>

                            <li class="menu-item {{ Route::is('admin.manage.categories') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.manage.categories') }}" class="menu-link"
                                    tabindex="-1">Categories</a>
                            </li>

                            <li class="menu-item {{ Route::is('admin.manage.products') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.manage.products') }}" class="menu-link"
                                    tabindex="-1">Products</a>
                            </li>

                            <li class="menu-item {{ Route::is('admin.manage.orders') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.manage.orders') }}" class="menu-link"
                                    tabindex="-1">Orders</a>
                            </li>
                        </ul>
                        <!-- /child menu -->
                    </li>

                    <li class="menu-item {{ Route::is('admin.manage.faqs') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.manage.faqs') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">FAQs</span>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('admin.manage.contact-us') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.manage.contact-us') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">Contact Us</span>
                        </a>
                    </li>

                    <li class="menu-item {{ Route::is('admin.get.emails') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.get.emails') }}" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">News Latter Emails</span>
                        </a>
                    </li>

                </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
        </div><!-- /.aside-menu -->
        <!-- Skin changer -->
        {{-- <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
                    class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer --> --}}
    </div><!-- /.aside-content -->
</aside><!-- /.app-aside -->
