  <!-- notification Js -->
<script>
  $(document).ready(function(){
    toastr.options = {
      // "rtl": true,
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "slideDown",
      "hideMethod": "fadeOut"
    }
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        toastr.error('{{ $error }}')
      @endforeach
    @endif


    @if(Session::has('message-success'))
      Swal.fire("{{ Session::get('message-success') }}", "", "success");
    @endif
    @if(Session::has('message-info'))
      Swal.fire("{{ Session::get('message-info') }}", "", "info");
    @endif
    @if(Session::has('message-danger'))
      Swal.fire("{{ Session::get('message-danger') }}", "", "danger");
    @endif    
    @if(Session::has('message-error'))
      Swal.fire("{{ Session::get('message-error') }}", "", "error");
    @endif
  });
</script>