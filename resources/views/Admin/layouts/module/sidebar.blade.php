<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
     <span class="brand-text font-weight-light">Travelasido</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Admin Travelasido</a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
         <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{Request::segment(2) == 'dashboard' ? 'active' : ''}}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         {{-- Master Menu --}}
         <li class="nav-item has-treeview {{Request::segment(2) == 'master' ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::segment(2) == 'master' ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{Request::segment(3) == 'categories' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link {{Request::segment(3) == 'products' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Seller</p>
                 <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.sellers.index')}}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Khusus</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.sellers.index')}}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Umum</p>
                  </a>
                </li>
               </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Khusus</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.customers.index')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Umum</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
         </li>
         {{-- End Master Menu --}}
         
         
         <li class="nav-header">Pengaturan</li>
         {{-- Settings Menu --}}
         <li class="nav-item has-treeview {{Request::segment(2) == 'settings' ? 'menu-open' : ''}}">
          <a href="#" class="nav-link {{Request::segment(2) == 'settings' ? 'active' : ''}}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{ route('admin.settings.website') }}" class="nav-link {{Request::segment(3) == 'website' ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Website</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.settings.selling') }}" class="nav-link {{Request::segment(3) == 'selling' ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Penjualan</p>
              </a>
            </li>
          </ul>
         </li>
         {{-- End Settings Menu --}}
         <li class="nav-header">MISCELLANEOUS</li>
         <li class="nav-item has-treeview">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <p>
                    {{ __('Logout') }}
                </p>
            </a>
        ​
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>