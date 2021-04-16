<!DOCTYPE html>
<html lang="en">
<head>
	@yield('head')
	@notifyCss
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('/images/icons/favicon.png') }}">

<!--===============================================================================================-->
<link href="{{ URL::asset('css/main.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('css/util.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/vendor/MagnificPopup/magnific-popup.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/vendor/slick/slick.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/vendor/select2/select2.min.css') }}" rel="stylesheet" type="text/css" >

<link href="{{ URL::asset('/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/vendor/animate/animate.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/fonts/linearicons-v1.0.0/icon-font.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/fonts/iconic/css/material-design-iconic-font.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >


</head>
<body class="animsition">
    @include('inc.navbar')
	@include('inc.cart')
    @yield('content')
    @include('inc.footer')
    @include('inc.modal')
<!--===============================================================================================-->	

	<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->

	<script type="text/javascript" src="{{ asset('/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	
	<script type="text/javascript" src="{{ asset('/vendor/bootstrap/js/popper.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('/vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/slick/slick.min.js') }}"></script>
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/parallax100/parallax100.js') }}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src=""></script>
	<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
	@yield('foot')
	@include('notify::messages')
	@notifyJs
	@include('sweetalert::alert')
</body>
</html>