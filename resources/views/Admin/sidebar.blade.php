<ul class="sidebar-menu" data-widget="tree">
    <li class="header">{{__('MAIN NAVIGATION')}}</li>

    <li>
        <a href="/companies"><i class="far fa-building"></i> <span>@lang('translate.companies')</span></a>
    </li>

    <li>
        <a href="/employees"><i class="fas fa-users"></i> <span>{{__('translate.employees')}}</span></a>
    </li>
    <li>
        <a href="/items"><i class="fas fa-boxes"></i> <span>{{__('Item')}}</span></a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fab fa-sellcast"></i> <span>Sell</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/sells"><i class="fa fa-circle-o"></i> Sale</a></li>
          <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Sell Summaries
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/sells-summary-per-day"><i class="fa fa-circle-o"></i> Per Day</a></li>
                <li><a href="/sells-summary"><i class="fa fa-circle-o"></i> Per Employees</a></li>
       
              </ul>
            </li>
        </ul>
      </li>
</ul>