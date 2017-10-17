@extends('admin.layout.main')

@section('title', '管理控制台')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="/">首页</a></li>
        <li class="active">工作台</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">工作台 <small></small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-2 -->
        <div class="col-md-2 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>杂志社总数</h4>
                </div>
                <div class="stats-link">
                    <a href="/admin/magazine">查看详细 <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-2 -->
        <!-- begin col-2 -->
        <div class="col-md-2 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                <div class="stats-info">
                    <h4>期刊总数</h4>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">查看详细 <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-2 -->



    </div>
    <!-- end row -->

@endsection

@section('pagescript')
    <script>
        activeMenu('admin-index'); // 激活菜单
    </script>
@endsection
