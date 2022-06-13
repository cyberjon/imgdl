<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="c-sidebar-brand d-md-down-none">
        Image metadata
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ url('/') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt"></i>
                Images
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ url('/upload') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt"></i>
                Upload File
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ url('/download') }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon"></i>
                From URL
            </a>
        </li>
    </ul>

</div>