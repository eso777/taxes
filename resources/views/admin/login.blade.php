<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>SaWa4 Control Panel</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
{!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')!!}
{!! Html::style('back/assets/global/plugins/font-awesome/css/font-awesome.min.css')!!}
{!! Html::style('back/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')!!}
{!! Html::style('back/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')!!}
{!! Html::style('back/assets/global/plugins/uniform/css/uniform.default.css')!!}

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{!! Html::style('back/assets/admin/pages/css/login-rtl.css')!!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
{!! Html::style('back/assets/global/css/components-md-rtl.css')!!}
{!! Html::style('back/assets/global/css/plugins-md-rtl.css')!!}
{!! Html::style('back/assets/admin/layout/css/layout-rtl.css')!!}
{!! Html::style('back/assets/admin/layout/css/themes/default-rtl.css')!!}
{!! Html::style('back/assets/admin/layout2/css/custom-rtl.css')!!}

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="">
		{!! Html::image('back/assets/global/img/sawa4-white.png')!!}
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	{!!Form::open()!!}
		<h3 class="form-title">تسجيل الدخول</h3>
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					{{Lang::get('assets.error')}}<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">اسم المستخدم</label>
			<input class="form-control form-control-solid placeholder-no-fix" name="email" type="text"  placeholder="البريد الإلكترونى او اسم المستخدم" name="username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" name="password" type="password" autocomplete="off" placeholder="كلمه السر" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">تسجيل الدخول</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>تذكرنى </label>
		</div>
		
		
	</form>
	
</div>
<div class="copyright">
		SawaNews 1.1.0
	  جميع الحقوق محفوظه لمؤسسه سوافور © 2016.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

{!!Html::script('back/assets/global/plugins/jquery.min.js')!!}
{!!Html::script('back/assets/global/plugins/jquery-migrate.min.js')!!}
{!!Html::script('back/assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}
{!!Html::script('back/assets/global/plugins/jquery.blockui.min.js')!!}
{!!Html::script('back/assets/global/plugins/uniform/jquery.uniform.min.js')!!}
{!!Html::script('back/assets/global/plugins/jquery.cokie.min.js')!!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!!Html::script('back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')!!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!!Html::script('back/assets/global/scripts/metronic.js')!!}
{!!Html::script('back/assets/admin/layout/scripts/layout.js')!!}
{!!Html::script('back/assets/admin/layout/scripts/demo.js')!!}
{!!Html::script('back/assets/admin/pages/scripts/login.js')!!}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>