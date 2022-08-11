<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.frontend.style')
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('includes.frontend.navbar')

	<!-- Cart -->
	@include('includes.frontend.cart')

	
    @yield('content')
		

	<!-- Footer -->
	@include('includes.frontend.footer')


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

    @include('includes.frontend.script')

</body>
</html>