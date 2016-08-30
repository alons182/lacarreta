<aside class="sidebar canvas-left bg-dark">
                <!-- main navigation -->
                <nav class="main-navigation">
                    <ul>
                        <li>
                            <a href="{!! URL::route('admin.dashboard') !!}">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{!! URL::route('admin.users.index') !!}">
                                <i class="fa fa-users"></i>
                                <span>Usuarios</span>
                            </a>
                        </li>
                         <li>
                            <a href="{!! URL::route('admin.orders.index') !!}">
                                <i class="fa fa-edit"></i>
                                <span>Ordenes</span>
                            </a>
                        </li>
                       

                    </ul>
                </nav>
                <!-- /main navigation -->


                <!-- footer -->
                <footer>
                    <div class="about-app pd-md animated pulse">
                        <a href="#">
                            <img src="/img/avotz.png" alt="Avotz">
                        </a>
                        <span>
                            <b>This</b> is a system admin created in Laravel by Avotz .
                            <a href="http://avotz.com">
                                <b>Find out more</b>
                            </a>
                        </span>
                    </div>

                    <div class="footer-toolbar pull-left">
                        <a href="#" class="pull-left help">
                            <i class="fa fa-question-circle"></i>
                        </a>

                        <a href="#" class="toggle-sidebar pull-right hidden-xs">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </div>
                </footer>
                <!-- /footer -->
            </aside>
