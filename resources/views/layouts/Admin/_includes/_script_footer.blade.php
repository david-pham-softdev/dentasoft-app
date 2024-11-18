<script src="{{ asset('assets/SiteAssets/js/vendors/jquery.min.js') }}"></script>
<script src="{{ asset('assets/SiteAssets/js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/SiteAssets/js/global.js') }}"></script>
<script type="text/javascript"> 
	$(document).ready( function() {
	$('#flash_message').delay(3000).fadeOut();
	});
</script>



@yield('layout_js')