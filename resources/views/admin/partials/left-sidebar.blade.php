@php
 use Illuminate\Support\Str;
$current_route= request()->route()->getName();

@endphp 
 
 
 <!--begin::Sidebar-->
 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('admin-assets/dist/assets/img/AdminLTELogo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin Panel</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false">
              <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link 
                {{$current_route=='admin.dashboard'?'active':''}}">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item {{$current_route=='users.index'?'menu-open':''}}">
                <a href="#" class="nav-link
                {{$current_route=='users.index'?'active':''}}">
                  <i class="nav-icon bi bi-person"></i>
                  <p>
                    User Management
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link
                    {{$current_route=='admin.users.index'?'active':''}}">
                      <i class="nav-icon bi bi-persons"></i>
                      <p>Users</p>
                    </a>
                  </li>
              </li>
            </ul>
            <li class="nav-item {{ Str::startsWith($current_route, 'admin.products.') ? 'menu-open' : '' }}">
              <a href="{{ route('admin.products.index') }}" class="nav-link {{ Str::startsWith($current_route, 'admin.products.') ? 'active' : '' }}">
              <i class="nav-icon bi bi-box-seam"></i>
                <p>Products</p>
              </a>
            </li>

            <li class="nav-item {{ Str::startsWith ($current_route, 'admin.productCategories.') ? 'menu-open' : ''}}">
                    <a href="{{ route('admin.productCategories.index') }}" class="nav-link {{ Str::startsWith ($current_route, 'admin.productCategories.') ? 'active' : ''}}">
                        <i class="nav-icon bi bi-folder"></i>
                        <p>Product Category</p>
                    </a>
                </li>

            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->