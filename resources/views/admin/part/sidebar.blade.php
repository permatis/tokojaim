
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            
            <!-- Optionally, you can add icons to the links -->
            <li><a href="#"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
           
            <li class="treeview">
              <a href="#"><i class="fa fa-shopping-bag"></i> <span>Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/produk') }}"><i class="fa fa-circle-o"></i>List Produk</a></li>
                <li><a href="{{ url('admin/produk/create') }}"><i class="fa fa-circle-o"></i>tambah Produk</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-list"></i> <span>Kategori</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
               <li><a href="#/tambah_produk"><i class="fa fa-circle-o"></i>tambah Produk</a></li>
                <li><a href="#/list_produk"><i class="fa fa-circle-o"></i>List Produk</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-area-chart"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
               <li><a href="#/tambah_produk"><i class="fa fa-circle-o"></i>tambah Produk</a></li>
                <li><a href="#/list_produk"><i class="fa fa-circle-o"></i>List Produk</a></li>
              </ul>
            </li>

             <!-- Optionally, you can add icons to the links -->
            <li><a href="#"><i class="fa fa-tachometer"></i> <span>Management User</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-columns"></i> <span>Halaman</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
               <li><a href="#/tambah_produk"><i class="fa fa-circle-o"></i>tambah Produk</a></li>
                <li><a href="#/list_produk"><i class="fa fa-circle-o"></i>List Produk</a></li>
              </ul>
            </li>

             <li class="treeview">
              <a href="#"><i class="fa fa-credit-card"></i> <span>Rekening Bank</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
               <li><a href="#/tambah_produk"><i class="fa fa-circle-o"></i>tambah Produk</a></li>
                <li><a href="#/list_produk"><i class="fa fa-circle-o"></i>List Produk</a></li>
              </ul>
            </li>



          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->