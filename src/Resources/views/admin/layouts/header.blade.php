<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                    <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                        </span>
                    </h5>
                </div>
                <div style="max-height: 230px;" data-simplebar>
                </div>
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop"
               href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="account-user-avatar">
{{--                    <img src="" alt="" class="rounded-circle">--}}
                </span>
                <span>
                    <span class="account-user-name mt-1">John Doe</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Hoş Geldin</h6>
                </div>
                <a href="" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>Profil</span>
                </a>
                    <a href="" class="dropdown-item notify-item">
                        <i class="mdi mdi-tools me-1"></i>
                        <span>Geliştirici Paneli</span>
                    </a>
                <form action="" method="POST" class="d-inline">
                    <button type="submit" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Çıkış</span>
                    </button>
                </form>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
