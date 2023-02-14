<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x">
	<title>Trung Nguyễn </title>
	<base href="{{asset('')}}">



	<!-- Bootstrap Core CSS -->
    <link href="{{asset('source/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('source/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('source/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('source/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('source/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="source/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('source/assets/dest/vendors/colorbox/example3/colorbox.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/rs-plugin/css/settings.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/rs-plugin/css/responsive.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('source/assets/dest/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/animate.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('source/assets/dest/css/huong-style.css')}}">
	
</head>
<body>
	

	@include ("NQT.header")
	
	@yield('slider')
	
	@yield('noidung')
	
	@include ("NQT.footer")



	





	<!-- include js files -->

	<script src="{{asset('/source/assets/dest/js/jquery.js')}}"></script>
	<script src="{{asset('/source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js')}}"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="{{asset('/source/assets/dest/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
	<script src="{{asset('/source/assets/dest/vendors/colorbox/jquery.colorbox-min.js')}}"></script>
	<script src="{{asset('/source/assets/dest/vendors/animo/Animo.js')}}"></script>
	<script src="{{asset('/source/assets/dest/vendors/dug/dug.js')}}"></script>
	<script src="{{asset('/source/assets/dest/js/scripts.min.js')}}"></script>
	<script src="{{asset('/source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
	<script src="{{asset('/source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script src="{{asset('/source/assets/dest/js/waypoints.min.js')}}"></script>
	<script src="{{asset('/source/assets/dest/js/wow.min.js')}}"></script>
	<!--customjs-->
	<script src="{{asset('/source/assets/dest/js/custom2.js')}}"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>

	<script>
	$(document).ready(function($) {    
		$('#tim').on('keyup',function(){

			$value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);

                    }
                })
            })
	})
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
	</script>

</body>
</html>
