<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{Route::current()->uri() !='/dashboard'}}">
                <a href="/dashboard">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{\Str::is('barang.*', Route::currentRouteName())}}">
                <a href="/barang">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Barang</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{\Str::is('pinjam.*', Route::currentRouteName())}}">
                <a href="/pinjam">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Peminjaman</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>