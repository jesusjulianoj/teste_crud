<?php 
  @session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Teste para Desenvolvedor PHP Júnior Full Stack</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/6a03ddd410.js" crossorigin="anonymous"></script>

  <script type="text/javascript" src="{{ asset('js/jquery-1.2.6.pack.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.maskedinput-1.1.4.pack.js') }}"/></script>

  <script src="{{ asset('js/mascaras.js') }}"></script>
  <script src="{{ asset('js/util.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#estado').change(function(){
            $('#dv_cidade').load('lstCidade/'+$('#estado').val());
        });
    });

    $(document).ready(function(){
        $('#estadoEdit').change(function(){
            $('#dv_cidade').load('../../lstCidade/'+$('#estadoEdit').val());
        });
    });
  </script>

</head>
<body>
  <div>
    <div class="content">
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3>@yield('titulo')</h3>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container">
            @yield('content')
        </div>
      </section>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>
<?php
//echo(@$idUsuarioDelete . " - abre modal");
if(@$idUsuarioDelete != ""){
  echo "<script>$('#exampleModal').modal('show');</script>";
}
?>