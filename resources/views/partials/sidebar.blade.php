<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admins/dist/admin-lte/dist/img/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            @if(request()->segment(1) == 'admin')
            <li @if(request()->segment(1) == 'admin' && !request()->segment(2)) class="active" @endif>
                <a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            <li class="treeview @if(request()->segment(2) == 'produks') active @endif">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Produks</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->segment(2) == 'produks' && request()->segment(3) != 'create') class="active" @endif>
                        {!! link_to('admin/produks', 'List Produk') !!}
                    </li>
                    <li @if(request()->segment(2) == 'produks' && request()->segment(3) == 'create') class="active" @endif>
                        {!! link_to('admin/produks/create', 'Tambah Produk') !!}
                    </li>
                </ul>
            </li>
            <li class="treeview @if(request()->segment(2) == 'kategori') active @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Kategori</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->segment(2) == 'kategori' && request()->segment(3) != 'create') class="active" @endif>
                        {!! link_to('admin/kategori', 'List Kategori') !!}
                    </li>
                    <li @if(request()->segment(2) == 'kategori' && request()->segment(3) == 'create') class="active" @endif>
                        {!! link_to('admin/kategori/create', 'Tambah Kategori') !!}
                    </li>
                </ul>
            </li>
            <li class="treeview @if(request()->segment(2) == 'tags') active @endif">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Tags</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->segment(2) == 'tags' && request()->segment(3) != 'create') class="active" @endif>
                        {!! link_to('admin/tags', 'List Tags') !!}
                    </li>
                    <li @if(request()->segment(2) == 'tags' && request()->segment(3) == 'create') class="active" @endif>
                        {!! link_to('admin/tags/create', 'Tambah Tags') !!}
                    </li>
                </ul>
            </li>
            <li class="treeview @if(request()->segment(2) == 'users') active @endif">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Management User</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->segment(2) == 'users' && request()->segment(3) != 'create') class="active" @endif>
                        {!! link_to('admin/users', 'List Users') !!}
                    </li>
                    <li @if(request()->segment(2) == 'users' && request()->segment(3) == 'create') class="active" @endif>
                        {!! link_to('admin/users/create', 'Tambah Users') !!}
                    </li>
                </ul>
            </li>
            </li>
            <li class="treeview @if(request()->segment(2) == 'transaksi') active @endif">
                <a href="{{ url('admin/transaksi') }}">
                    <i class="fa fa-area-chart"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="treeview @if(request()->segment(2) == 'konfirmasi') active @endif">
                <a href="{{ url('admin/konfirmasi') }}">
                    <i class="fa fa-file"></i>
                    <span>Konfirmasi Pembayaran</span>
                </a>
            </li>
            @endif

            @if(request()->segment(1) == 'user')
            <li @if(request()->segment(1) == 'user' && !request()->segment(2)) class="active" @endif>
                <a href="{{ URL::to('user') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            <li class="treeview @if(request()->segment(2) == 'status_pemesanan') active @endif">
                <a href="{{ URL::to('user/status_pemesanan') }}">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span>Status Pemesanan</span>
                </a>
            </li>
            <li class="treeview @if(request()->segment(2) == 'history') active @endif">
                <a href="{{ URL::to('user/history') }}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            @endif
            <li class="header">INFORMASI</li>
            <li class="treeview">
                <a href="{{ URL::to('/logout') }}">
                <i class="fa fa-external-link"></i>
                <span>Logout</span></a>
            </li>
        </ul>
    </section>
</aside>
