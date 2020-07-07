<nav class="navigation-menu">
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{ route('dashboard') }}" class="index-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-accusoft"></i>
                <span>Admission Management</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admission.create') }}">New Admission</a></li>
                <li><a href="{{ route('admission.index') }}">Admission List</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-app-store-ios"></i>
                <span>Attendance</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#">Upload Attendance</a></li>
                <li><a href="#">Attendance Processing</a></li>
            </ul>
        </li>

        <li class="nav-title">People Management</li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-users"></i>
                <span>Student Information</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('student.index') }}">Student List</a></li>
                <li><a href="#">Student History</a></li>
                <li><a href="#">Guardian List</a></li>
                <li><a href="#">Inactive Student</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-user"></i>
                <span>Teacher Information</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('teacher.create') }}">New Teacher</a></li>
                <li><a href="{{ route('teacher.index') }}">Teacher List</a></li>
            </ul>
        </li>

        <li class="nav-title">Academic manage</li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-box"></i>
                <span>Department</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('department.create') }}">New Department</a></li>
                <li><a href="{{ route('department.index') }}">Department List</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-database"></i>
                <span>Sessions</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('session.create') }}">New Session</a></li>
                <li><a href="{{ route('session.index') }}">Session List</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-delicious"></i>
                <span>Class</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('class.create') }}">New Class</a></li>
                <li><a href="{{ route('class.index') }}">Class list</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-object-group"></i>
                <span>Group</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('group.create') }}">New Group</a></li>
                <li><a href="{{ route('group.index') }}">Group list</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-puzzle-piece"></i>
                <span>Section</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('section.create') }}">New Section</a></li>
                <li><a href="{{ route('section.index') }}">Section list</a></li>
                <li><a href="{{ route('section.index') }}">Class Session</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fab fa-delicious"></i>
                <span>Subject</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('subject.create') }}">New Subject</a></li>
                <li><a href="{{ route('subject.index') }}">Subject List</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-cog"></i>
                <span>Syllabus</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#">New Syllabus</a></li>
                <li><a href="#">Syllabus List</a></li>
            </ul>
        </li> 

        <li class="nav-title">Routine manage</li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-list"></i>
                <span>Class Routine</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('class-routine.create') }}">New Class Routine</a></li>
                <li><a href="{{ route('class-routine.index') }}">Class Routine list</a></li>
                <li><a href="{{ route('day.index') }}">Day Manage</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-list"></i>
                <span>Exam Manage</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('exam.settings') }}">Exam Settings</a></li>
            </ul>
        </li>        
        <li class="nav-title">Website Manage</li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-envelope"></i>
                <span>Notice Manage</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('notice.create') }}">Add Notice</a></li>
                <li><a href="{{ route('notice.index') }}">Notice List</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-envelope"></i>
                <span>Slider Manage</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('slider.create') }}">Add Slide</a></li>
                <li><a href="{{ route('slider.index') }}">Slider List</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fas fa-list"></i>
                <span>Exam Routine</span>
                <i class="fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="#">Exam Category</a></li>
                <li><a href="#">New Exam Routine</a></li>
                <li><a href="#">Exam Routine list</a></li>
            </ul>
        </li>
    </ul>
</nav>