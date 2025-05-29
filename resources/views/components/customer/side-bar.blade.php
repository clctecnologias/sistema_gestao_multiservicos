<div wire:ignore class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a> <span class="logo-name">Dashboard </span> </a>        
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Principal</li>
            <li class="rounded  {{ Route::current()->getname() == 'dashboard.customer.home' ? 'active' : '' }}">
              <a href="{{ route('dashboard.customer.home') }}" class="nav-link "><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class=" {{ Route::current()->getname() == 'dashboard.customer.payments' ? 'active' : '' }}">
              <a href="{{ route('dashboard.customer.payments') }}" class="nav-link">
                <i data-feather="briefcase"></i><span>Meus pagamentos</span></a>   
            </li>     
 
          </ul>
        </aside>
      </div>