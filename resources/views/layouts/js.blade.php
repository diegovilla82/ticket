
<script src="{{ asset('assets/web/assets/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/smoothscroll/smooth-scroll.js') }}"></script>
<script src="{{ asset('assets/ytplayer/index.js') }}"></script>
<script src="{{ asset('assets/dropdown/js/navbar-dropdown.js') }}"></script>
<script src="{{ asset('assets/theme/js/script.js') }}"></script>

<script>
$(document).ready(function () {
	var url = window.location;
	$('.nav-link li a[href="'+ url +'"]').parent().addClass('active');
	$('.nav-link li a').filter(function() {
		return this.href == url;
	}).parent().addClass('active');
});
</script>