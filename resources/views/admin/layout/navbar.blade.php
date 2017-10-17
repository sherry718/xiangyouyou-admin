
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li id="side-menu" class="nav-profile nav metismenu in">
                <div class="image">
                    <a href="javascript:;"><img src="{{ $user->avatar_image_url }}" class="avatar" alt="" /></a>
                </div>
                <div class="info">
                    {{$user->nickname}}（{{ $user->first_role_display_name }}）
                    <small>{{$user->company}}</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav-container">
            <li class="nav-header">导航菜单</li>
            <li rel="admin-index">
                <a href="/admin">
                    <i class="fa fa-laptop"></i>
                    <span>工作台</span>
                </a>
            </li>

            <li class="nav-header">系统设置</li>
            @if($user->can('system'))
                <li>
                    <a href="/admin/entrust/role-list" title="角色权限配置">
                        <i class="fa fa-puzzle-piece"></i>
                        <span>角色权限配置</span>
                    </a>
                </li>
                <li rel="billSplit">
                    <a href="/admin/split-bill" title="分账设置">
                        <i class="fa fa-money"></i>
                        <span>分账设置</span>
                    </a>
                </li>
            @endif
            <li rel="account-setting">
                <a href="/admin/account/setting">
                    <i class="fa fa-user-circle"></i>
                    <span>账户设置</span>
                </a>
            </li>
            <!-- end sidebar minify button -->
            <li class="nav-header">在线客服</li>
            <li rel="frequency">
                <a href="{{url('admin/message')}}" title="Pages">
                    <i class="glyph-icon fa fa-align-justify"></i>
                    <span>在线客服</span>
                </a>

            </li>
        </ul>
        <div>
            <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
        </div>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>