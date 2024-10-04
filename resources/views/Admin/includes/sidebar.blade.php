<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Customer Support</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.dashboard') }}"><i class='bx bx-radio-circle'></i>Graphical</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Pages</li>
        {{-- <li>
            <a href="{{ route('admin.cat.page') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
        </li> --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('admin.role.page')}}"><i class='bx bx-radio-circle'></i>Role</a>
                </li>
                <li>
                    <a href="{{ route('admin.cat.page') }}"><i class='bx bx-radio-circle'></i>Category</a>
                </li>
                <li>
                    <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Add Profile</a>
                </li>

            </ul>
        </li>


    </ul>
    <!--end navigation-->
</div>
