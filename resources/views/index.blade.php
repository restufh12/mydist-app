<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login Store</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/store_login.css')}}" rel="stylesheet">
    <style>
      .borderinput{
        border-color: #6c757d;
      }
    </style>
  </head>
  <body class="text-center bgimage">
    <form class="form-signin">
      <div class="input-group mb-3">
        <input type="text" class="form-control borderinput" placeholder="Store Code" aria-label="Store Code" aria-describedby="basic-addon2" id="StoreCode" name="StoreCode">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" onclick="LoginStore()">NEXT</button>
        </div>
      </div>
      <div class="alert alert-danger" id="alertnostorecode" style="display:none;">
        Please check your store code.
      </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
  </body>
  <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
</html>

<script>
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function LoginStore(){
    var StoreCode   = $("#StoreCode").val();
    $.ajax({
      type : "POST",
      url  : "{{ url('/cek_store') }}",
      dataType: 'JSON',
      data: {
        _token    : CSRF_TOKEN, 
        StoreCode : StoreCode
      },
      success  : function(data) {
        if(data=="1"){
          window.location.href = "{{ url('/login') }}";
        } else {
          $("#alertnostorecode").fadeTo(2000, 600).slideUp(300, function(){
            $("#alertnostorecode").slideUp(300);
          });
        }
      }
    });
  }
</script>

