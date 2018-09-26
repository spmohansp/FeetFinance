<div class="o-page__sidebar js-page-sidebar">
    <aside class="c-sidebar">
        <div class="c-sidebar__brand">
            <a href="{{ url('client/home') }}"><img src="{{ url('img/logo.png') }}" alt="Neat"></a>
        </div>


        <div class="c-sidebar__body">
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link @yield('dashboard')" href="{{ url('client/home') }}">
                        <i class="c-sidebar__icon feather icon-bar-chart"></i>Dashboard
                    </a>
                </li>
            </ul>


            <span class="c-sidebar__title">Masters</span>
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link @yield('customer')" href="{{ url('client/customer') }}">
                        <i class="c-sidebar__icon feather icon-user-plus"></i>Customer
                    </a>
                </li>

                <li>
                    <a class="c-sidebar__link @yield('staff')" href="{{ url('client/staff') }}">
                        <i class="c-sidebar__icon feather icon-hash"></i>Staff
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link @yield('vehicle')" href="{{ url('client/vehicle') }}">
                        <i class="c-sidebar__icon feather icon-wifi"></i>Vehicle
                    </a>
                </li>


            </ul>

            <span class="c-sidebar__title">Entry</span>
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link @yield('entry')" href="{{ url('client/entry') }}">

                        <i class="c-sidebar__icon feather icon-hash"></i>Add Entry

                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link @yield('expense')" href="{{ url('client/expense') }}">
                        <i class="c-sidebar__icon feather icon-hash"></i>Add Expense
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link @yield('income')" href="{{ url('client/income') }}">
                        <i class="c-sidebar__icon feather icon-hash"></i>Add Income
                    </a>
                </li>
            </ul>

            <span class="c-sidebar__title">View</span>
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link @yield('viewentry')" href="{{ url('client/viewentry') }}">

                        <i class="c-sidebar__icon feather icon-hash"></i>View Entry

                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link @yield('viewincome')" href="{{ url('client/viewincome') }}">
                        <i class="c-sidebar__icon feather icon-hash"></i>View Income
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link @yield('viewexpense')" href="{{ url('client/viewexpense') }}">
                        <i class="c-sidebar__icon feather icon-hash"></i>View Expense
                    </a>
                </li>
            </ul>


        </div>

        <a class="c-sidebar__footer" href="{{ url('/client/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
        </a>
        <form id="logout-form" action="{{ url('/client/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </aside>
</div>