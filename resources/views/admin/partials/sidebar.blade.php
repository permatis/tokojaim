<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin/dist/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
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

            <li class="treeview @if(request()->segment(2) == 'brands') active @endif">
                <a href="#">
                    <i class="fa fa-cube"></i>
                    <span>Brands</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->segment(2) == 'brands' && request()->segment(3) != 'create') class="active" @endif>
                        {!! link_to('admin/brands', 'List Brands') !!}
                    </li>
                    <li @if(request()->segment(2) == 'brands' && request()->segment(3) == 'create') class="active" @endif>
                        {!! link_to('admin/brands/create', 'Tambah Brands') !!}
                    </li>
                </ul>
            </li>

            <li class="treeview @if(request()->segment(2) == 'transaksi') active @endif">
                <a href="#">
                    <i class="fa fa-area-chart"></i>
                    <span>Transaksi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(request()->segment(2) == 'transaksi' && request()->segment(3) != 'create') class="active" @endif>
                        {!! link_to('admin/transaksi', 'List Transaksi') !!}
                    </li>
                    <li @if(request()->segment(2) == 'transaksi' && request()->segment(3) == 'create') class="active" @endif>
                        {!! link_to('admin/transaksi/create', 'Tambah Transaksi') !!}
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

        </ul>
    </section>
</aside>