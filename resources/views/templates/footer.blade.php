<!-- Scripts -->
<!-- Bootstrap core JavaScript-->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{URL::asset('js/draganddrop.js')}}"></script>
<script>
    const redirect = (element) =>  location.href =`/boards/${element.getAttribute('data-id-attribute')}`;
</script>
</body>
</html>
