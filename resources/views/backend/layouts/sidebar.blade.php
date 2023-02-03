            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('dashboard') }}">CV. Den Logistic</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        {{-- Dashboard --}}
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
                        </li>
                        {{-- Data Master --}}
                        <li class="menu-header">Data Master</li>
                        @if ((request()->segment(1) == 'rates') == true)
                            <li class="dropdown {{ Request::path() == 'rates' ? 'active' : '' }}">
                            @elseif((request()->segment(1) == 'employee') == true)
                            <li class="dropdown {{ Request::path() == 'employee' ? 'active' : '' }}">
                            @elseif((request()->segment(1) == 'customer') == true)
                            <li class="dropdown {{ Request::path() == 'customer' ? 'active' : '' }}">
                            @else
                            <li class="dropdown">
                        @endif
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                class="fas fa-columns"></i> <span>Data Master</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ request()->segment(1) == 'rates' ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('rates.index') }}">Data Tarif Pengiriman</a></li>
                            <li class="{{ request()->segment(1) == 'employee' ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('employee.index') }}">Data Karyawan</a></li>
                            <li class="{{ request()->segment(1) == 'customer' ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('customer.index') }}">Data Pelanggan</a></li>
                        </ul>
                        </li>
                        {{-- Transaction --}}
                        <li class="menu-header">Transaction</li>
                        <li class="{{ request()->segment(1) == 'transaction' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('transaction.index') }}"><i class="fas fa-bicycle"></i>
                                <span>Transaksi</span></a></li>
                        <li class="{{ request()->segment(1) == 'report' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('report.index') }}"><i class="far fa-file-alt"></i> <span>Report</span></a>
                        </li>
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div>
                </aside>
            </div>
