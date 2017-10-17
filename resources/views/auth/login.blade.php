<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v2.2/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 02:28:25 GMT -->
<head>
    <meta charset="utf-8" />
    <title>后台管理系统</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link href="assets/css/style.min.css" rel="stylesheet" />

    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image"><img src="assets/img/login-bg/bg-3.jpg" data-id="login-cover-image" alt="" /></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> 后台管理
                <small>后台管理系统v1</small>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <form name="formLogin" method="POST" class="margin-bottom-0">
                {{ csrf_field() }}
                <div class="form-group m-b-20">
                    <input name="username" type="text" class="form-control input-lg" placeholder="用户名" required />
                </div>
                <div class="form-group m-b-20">
                    <input name="password" type="password" class="form-control input-lg" placeholder="密码" required />
                </div>
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox" /> 记住我
                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">登录</button>
                </div>
                <div class="m-t-20">
                    <a href="#">找回密码</a>
                </div>
            </form>
        </div>
    </div>
    <!-- end login -->



</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="assets/crossbrowserjs/html5shiv.js"></script>
<script src="assets/crossbrowserjs/respond.min.js"></script>
<script src="assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->

<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script src="assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        $("form[name='formLogin']").on("submit", function(){

            var $this=$(this);
            $this.find('button[type="submit"]').attr('disabled',true);
            $.post('/login',$this.serialize(), function(result){
                window.location.reload();
            }).fail(function(data){
                var str = typeof(data) == 'string' ? data : data.responseJSON;
                alert(str);
                $this.find('button[type="submit"]').attr('disabled',false);
                return false;
            });
            return false;
        });
    });
</script>

</body>

<!-- Mirrored from seantheme.com/color-admin-v2.2/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 02:29:55 GMT -->
</html>
