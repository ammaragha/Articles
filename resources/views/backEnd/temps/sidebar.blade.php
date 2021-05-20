<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin') }}" aria-expanded="false">
                        <i class="fa fa-fort-awesome"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin/catigories') }}" aria-expanded="false">
                        <i class="fa fa-sitemap"></i>
                        <span class="hide-menu">Catigoties</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin/articals') }}" aria-expanded="false">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <span class="hide-menu">Articals</span>
                    </a>
                </li>
                 <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin/slider') }}" aria-expanded="false">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin/messages') }}" aria-expanded="false">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <span class="hide-menu">Messages 
                            @if(App\message::where('seen','0')->count())
                            <span class="badge badge-light">{{ App\message::where('seen','0')->count() }}</span>
                            @endif
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin/sittings') }}" aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span class="hide-menu">Sittings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
