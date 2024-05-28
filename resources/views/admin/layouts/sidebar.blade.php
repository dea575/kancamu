<div class="sidebar" data-color="blue">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}" class="simple-text">
                Admin
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/result*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.result.index') }}">
                    <i class="nc-icon nc-planet"></i>
                    <p>Hasil & Penanganan</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/question*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.question.index') }}">
                    <i class="nc-icon nc-bulb-63"></i>
                    <p>Pertanyaan</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/psychologist*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.psychologist.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Psikolog</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/article*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.article.index') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Artikel</p>
                </a>
            </li>
        </ul>
    </div>
</div>