<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu" href="#"><i class="fa fa-dashboard"></i>Hệ thống<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('/') }}">Bảng điều khiển</a>
                        <a href="{{ route('settings') }}">Cài đặt</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i>Sự phụ thuộc<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('clients') }}">Khách hàng<span class="label label-dependencies pull-right" style="margin-top:4px;">{{ Cache::get('countClients') }}</span></a>
                        <a href="{{ route('employees') }}">Nhân viên<span class="label label-dependencies pull-right" style="margin-top:4px">{{ Cache::get('countEmployees') }}</span></a>
                        <a href="{{ route('deals') }}">Giao dịch<span class="label label-dependencies pull-right" style="margin-top:4px">{{ Cache::get('countDeals') }}</span></a>
                        <a href="{{ route('companies') }}">Công ty<span class="label label-dependencies pull-right" style="margin-top:4px">{{ Cache::get('countCompanies') }}</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-money"></i>Marketing<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('products') }}">Sản phẩm<span class="label label-marketing pull-right" style="margin-top:4px">{{ Cache::get('countProducts') }}</span></a>
                        <a href="{{ route('tasks') }}">Nhiệm vụ<span class="label label-marketing pull-right" style="margin-top:4px">{{ Cache::get('countTasks') }}</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i>Bán Hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('finances') }}">Tài chính<span class="label label-sales pull-right" style="margin-top:4px">{{ Cache::get('countFinances') }}</span></a>
                        <a href="{{ route('sales') }}">Bán hàng<span class="label label-sales pull-right" style="margin-top:4px">{{ Cache::get('countSales') }}</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul style="margin-top: 10px; color: #000;margin-left:-30px;font-size: 14px;"></a>
            <h4>Thông tin <a href="{{ route('reload-info') }}"><span class="refresh-info">Làm mới</span></a></h4>
            <li><i class="fa fa-money" aria-hidden="true"></i> Thu nhập hôm nay:  {{ Cache::get('todayIncome') }}</li>
            <li><i class="fa fa-money" aria-hidden="true"></i> Thu nhập hôm qua: {{ Cache::get('yesterdayIncome') }}</li>
            <li><i class="fa fa-money" aria-hidden="true"></i> Vòng quay tiền mặt:  {{ Cache::get('cashTurnover') }}</li>
            <br>
            <li><i class="fa fa-cogs" aria-hidden="true"></i> Hoạt động: {{ Cache::get('countAllRowsInDb')  }}</li>
            <li><i class="fa fa-book" aria-hidden="true"></i> Nhật kí hệ thống: {{ Cache::get('countSystemLogs') }}</li>
        </ul>
    </div>
</nav>
