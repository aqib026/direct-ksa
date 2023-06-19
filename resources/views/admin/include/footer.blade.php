
			<footer>
				<div class="text-center"><strong class="footer-text">Admin Panel</strong></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

@stack('script')
	<!-- jQuery -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<!-- FastClick -->
	<script src="'{{ asset('js/fastclick.js') }}'"></script>
	<!-- NProgress -->
	<script src="{{ asset('js/nprogress.js') }}"></script>
	@stack('script')
	<!-- Custom Theme Scripts -->
	<script src="{{ asset('js/custom.min.js') }}"></script>
</body>

</html>