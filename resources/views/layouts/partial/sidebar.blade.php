<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="@route('/')">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="@route('student.index')">
                <i class="bi bi-grid"></i>
                <span>Student</span> 
            </a>
        </li><!-- End billing Nav -->

        <li class="nav-item">
            <a class="nav-link" href="@route('guardian.index')">
                <i class="bi bi-grid"></i>
                <span>Guardian</span> 
            </a>
        </li><!-- End billing Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{url('monitor')}}">
                <i class="bi bi-grid"></i>
                <span>Monitor</span>
            </a>
        </li><!-- End role Nav -->

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="bi bi-grid"></i>
                <span>Logout</span>
            </a>
        </li><!-- End billing Nav -->
    </ul>
</aside>
