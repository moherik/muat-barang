<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">MUAT BARANG</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item {{ activeClass('admin.dashboard') }}">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <span class="menu-icon iconify" data-icon="mdi:view-dashboard-outline" data-inline="false" data-width="24" data-height="24"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="menu-icon iconify" data-icon="mdi:cart-outline" data-inline="false" data-width="24" data-height="24"></span>
                    <span>Order</span>
                </a>
            </li>
            <li class="nav-item {{ activeClass('admin.packet_category') }}">
                <a href="{{route('admin.packet_category')}}" class="nav-link">
                    <span class="menu-icon iconify" data-icon="mdi:cube-outline" data-inline="false" data-width="24" data-height="24"></span>
                    <span>Kategori Paket</span>
                </a>
            </li>
            <li class="nav-item {{ activeClass('admin.delivery_type') }}">
                <a href="{{route('admin.delivery_type')}}" class="nav-link">
                    <span class="menu-icon iconify" data-icon="mdi:truck-delivery-outline" data-inline="false" data-width="24" data-height="24"></span>
                    <span>Jenis Pengiriman</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="menu-icon iconify" data-icon="mdi:bike" data-inline="false" data-width="24" data-height="24"></span>
                    <span>Driver</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="menu-icon iconify" data-icon="mdi:account-multiple-outline" data-inline="false" data-width="24" data-height="24"></span>
                    <span>User</span>
                </a>
            </li>
        </ul>
    </aside>
</div>