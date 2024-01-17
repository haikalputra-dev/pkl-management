<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Poltek<span>SMI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Admin</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Data Master</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="/admin/user" class="nav-link">User</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/instansi" class="nav-link">Instansi</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pembimbing" class="nav-link">Pembimbing</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/siswa" class="nav-link">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/tim" class="nav-link">Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/staff" class="nav-link">Staff</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Pengajuan</li>
            <li class="nav-item">
                <a href="{{route('indexPengajuan')}}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Pengajuan</span>
                </a>
            </li>
        </ul>
    </div>
</nav>