 <header class="header header-fixed navbar bg-white">

            <div class="brand bg-success">
                <a href="#" class="fa fa-bars off-left visible-xs" data-toggle="off-canvas" data-move="ltr"></a>

                <a href="/admin" class="navbar-brand text-white">
                    <i class="fa fa-microphone mg-r-xs"></i>
                    <span>La Carreta

                    </span>
                </a>
            </div>



            <ul class="nav navbar-nav navbar-right off-right">
                <li class="hidden-xs">
                    <a href="#">
                        {!! auth()->user()->name !!}
                    </a>
                </li>


                <li class="quickmenu mg-r-md">
                    <a href="#" data-toggle="dropdown">
                        <img src="/img/avatar.jpg" class="avatar pull-left img-circle" alt="user" title="user">
                        <i class="caret mg-l-xs hidden-xs no-margin"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right mg-r-xs">
                        <li>
                            <a href="#">
                                <div class="pd-t-sm">
                                    {!! auth()->user()->email !!}
                                    <br>

                                </div>

                            </a>
                        </li>

                        <li class="divider"></li>
                        <li>
                           <a href="/logout">Cerrar Session</a>
                          

                        </li>
                    </ul>
                </li>
            </ul>
        </header>