<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="@route('/')">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-student" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-student" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="@route('student.index')">
                        <i class="bi bi-circle"></i><span>Student</span>
                    </a>
                </li>
                <li>
                    <a href="@route('student.create')">
                        <i class="bi bi-circle"></i><span>Create student</span>
                    </a>
                </li>
            </ul>
        </li><!-- End student Nav -->

         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-guardian" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Guardian</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-guardian" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="@route('guardian.index')">
                        <i class="bi bi-circle"></i><span>Guardian</span>
                    </a>
                </li>
                <li>
                    <a href="@route('guardian.create')">
                        <i class="bi bi-circle"></i><span>Create guardian</span>
                    </a>
                </li>
            </ul>
        </li><!-- End guardian Nav -->


        <li class="nav-item">
            <a class="nav-link" href="@route('guardian.index')">
                <i class="bi bi-grid"></i>
                <span>Guardian</span>
            </a>
        </li><!-- End billing Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ url('monitor') }}">
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
