<aside id="sidebar-wrapper">
        <ul class="sidebar-menu mb-5">
            <li class="menu-header">@lang('Dashboard')</li>
            <li class="nav-item {{ menu('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>@lang('Dashboard')</span></a>
            </li>
    
    
            
    
    
           

            <li class="nav-item {{ menu(['admin.contact.setting.index']) }}">
                <a href="{{ route('admin.contact.setting.index') }}" class="nav-link"><i class="fas fa-envelope-open-text"></i>
                    <span>@lang('Manage Contact')</span></a>
            </li>
    
            

            <li class="nav-item {{ menu(['admin.project.index']) }}">
                <a href="{{ route('admin.project.index') }}" class="nav-link"><i class="fas fa-envelope-open-text"></i>
                    <span>@lang('Portfolios')</span></a>
            </li>

            <li class="nav-item {{ menu(['admin.service.index']) }}">
                <a href="{{ route('admin.service.index') }}" class="nav-link"><i class="fas fa-envelope-open-text"></i>
                    <span>@lang('Future Projects')</span></a>
            </li>

           
    
           
    
            <li class="nav-item {{ menu('admin.page.index*') }}">
                <a href="{{ route('admin.page.index') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>@lang('Services')</span></a>
            </li>
    
    
            <li class="nav-item {{ menu('admin.team.index') }}">
                <a href="{{ route('admin.team.index') }}" class="nav-link"><i class="fas fa-users-cog"></i>
                    <span>@lang('successfull exists')</span></a>
            </li>
    
    
    
    
            <li class="menu-header">@lang('General')</li>
    
            <li class="nav-item dropdown {{ menu(['admin.gs*','admin.social.manage*','admin.language*', 'admin.cookie']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-cog"></i><span>@lang('General Settings')</span></a>
                <ul class="dropdown-menu">
    
                    
                    
                   
                    <li class="{{ menu('admin.social.manage') }}"><a class="nav-link"
                            href="{{ route('admin.social.manage') }}">@lang('Social Links')</a></li>
                    <li class="{{ menu('admin.cookie') }}"><a class="nav-link"
                            href="{{ route('admin.cookie') }}">@lang('Cookie Concent')</a></li>
                    
                </ul>
            </li>
    
    
    
    
           
    
           
    
            <li class="nav-item {{ menu('admin.clear.cache') }}">
                <a href="{{ route('admin.clear.cache') }}" class="nav-link"><i class="fas fa-broom"></i>
                    <span>@lang('Clear Cache')</span></a>
            </li>
        
    
        </ul>
    </aside>
    