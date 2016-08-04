<!DOCTYPE html>
<html>
<head>
<title>Markito</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=""/>
<link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ URL::asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />			
<link rel="stylesheet" href="{{ URL::asset('assets/css/etalage.css') }}">
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />	

<link href='http://fonts.googleapis.com/css?family=Amaranth:400,700' rel='stylesheet' type='text/css'>
<script src="{{ URL::asset('assets/js/simpleCart.min.js') }}"> </script>

</head>
<body> 
	@include('frontend.partials.header')
	
	<div class="content">
		<div class="container">
		@yield('content')
		</div>
	</div>
	
	@include('frontend.partials.footer')

	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/megamenu.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/easing.js') }}"></script>
	<script src="{{ URL::asset('assets/js/owl.carousel.js') }}"></script>
	<script src="{{ URL::asset('assets/js/jquery.wmuSlider.js') }}"></script>
	<script src="{{ URL::asset('assets/js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/js/jquery.etalage.min.js') }}"></script>
	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<script>
		$(document).ready(function() {

			$(".megamenu").megamenu();

			$('.example1').wmuSlider({
				pagination : true,
			 	nav : false,
			});

			$("#owl-demo").owlCarousel({
				items : 4,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});

			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
			
			$('#toTop').UItoTop({ easingType: 'easeOutQuart' });


			$('#etalage').etalage({
				thumb_image_width: 300,
				thumb_image_height: 400,
				source_image_width: 900,
				source_image_height: 1200,
				show_hint: true,
				click_callback: function(image_anchor, instance_id){
					alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
				}
			});

	        $('#horizontalTab').easyResponsiveTabs({
	            type: 'default', //Types: default, vertical, accordion           
	            width: 'auto', //auto or any width like 600px
	            fit: true   // 100% fit in a container
	        });
		});
	</script>
	@stack('checkout')

</body>
</html>