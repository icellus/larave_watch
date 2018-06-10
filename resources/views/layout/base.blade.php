<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>腕表维修</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- 通用 -->
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<!-- style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	@yield('page_css')

	<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
	<!--[if lt IE 9]>
	<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
	<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>


	<![endif]-->

</head>
<body>
	@yield('content')

@include('layout.footer')

</body>
<!-- jq -->
<script type="text/javascript" src="js/jquery-1.12.2.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Validform -->
<script src="js/Validform_v5.3.2_min.js"></script>
<!-- style -->
<script type="text/javascript" src="/js/style.js"></script>


@yield('page_js')

</html>