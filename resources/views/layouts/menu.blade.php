<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('employees.index') }}" class="nav-link {{ Request::is('employees*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Employees</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('salaries.index') }}" class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-dollar-sign"></i>
        <p>Salaries</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('departments.index') }}" class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>Departments</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('banks.index') }}" class="nav-link {{ Request::is('banks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-university"></i>
        <p>Banks</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('documentations.index') }}" class="nav-link {{ Request::is('documentations*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>Documentations</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('payrolls.index') }}" class="nav-link {{ Request::is('payrolls*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>Payrolls</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('allowances.index') }}" class="nav-link {{ Request::is('allowances*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>Allowances</p>
    </a>
</li>


<li class="nav-item has-treeview {{ Request::is('attendances*') || Request::is('promotions*') || Request::is('employeerecords*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('attendances*') || Request::is('promotions*') || Request::is('employeerecords*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
            Employee Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('attendances.index') }}" class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>Attendances</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('promotions.index') }}" class="nav-link {{ Request::is('promotions*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Promotions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employeerecords.index') }}" class="nav-link {{ Request::is('employeerecords*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Employee Records</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item has-treeview {{ Request::is('leaves*') || Request::is('leavetypes*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('leaves*') || Request::is('leavetypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-suitcase"></i>
        <p>
            Leave Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('leaves.index') }}" class="nav-link {{ Request::is('leaves*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-plane-departure"></i>
                <p>Leaves</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('leavetypes.index') }}" class="nav-link {{ Request::is('leavetypes*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Leave Types</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('deductions.index') }}" class="nav-link {{ Request::is('deductions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-minus-circle"></i>
        <p>Deductions</p>
    </a>
</li>

@auth
    @if (Auth::user()->role === 'admin')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Users</p>
            </a>
        </li>
    @endif
@endauth

