<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex p-3">
                <i class="fa fa-home" aria-hidden="true"></i> <a href="{{ route('admin.dashboard') }}"
                    class="ms-3">Dashboard</a>
            </li>
            <li class="list-group-item d-flex p-3">
                <i class="fa fa-users" aria-hidden="true"></i><a href="{{ route('admin.users') }}"
                    class="ms-3">Users</a>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
                <i class="fa fa-user" aria-hidden="true"></i><a href="{{ route('tutor.index') }}"
                    class="ms-3">Tutors</a>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
                <i class="fa fa-graduation-cap " aria-hidden="true"></i><a href="{{ route('discipline.index') }}"
                    class="ms-3">Disciplines</a>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
                <i class="fa fa-book" aria-hidden="true"></i><a href="{{ route('subject.index') }}"
                    class="ms-3">Subjects</a>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
                <i class="fa fa-dollar" aria-hidden="true"></i> <a href="{{ route('booking.index') }}" class="ms-3">Bookings</a>
            </li>
            <li class="list-group-item d-flex align-items-center p-3">
                <i class="fa fa-envelope" aria-hidden="true"></i> <a href="{{ route('contact.index') }}" class="ms-3">Contact
                    Messages</a>
            </li>
            <!-- <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ route('account.myTutionApplications') }}">Jobs Applied</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ route('tution.stores') }}">Saved Jobs</a>
                            </li>     -->
            <li class="list-group-item d-flex align-items-center p-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i><a href="{{ route('account.logout') }}"
                    class="ms-3">Log out</a>
            </li>

        </ul>
    </div>
</div>
