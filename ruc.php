<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta RUC</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consulta
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"  href="dni.php">Consulta DNI</a></li>
            <li><a class="dropdown-item" href="ruc.php">Consulta RUC</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div>
      <input type="text" autocomplete="off" id="ruc" name="ruc" style="margin-left: 43%; margin-top:2%">
      <button id="pruebaruc">Consultar</button>     
</div>
<div id="content-box">
  <div id="profile-image">
    <img src="img/expediente.png" alt="Imagen de perfil" width="100" height="100">
  </div>
  <div id="content">
        <div >RUC: <label id="rucNumero"> </label></div>
        <div >Nombre o Razón social: <label id="razonsocial">  </label ></div>
        <div> Estado: <label  id="estado"> </label > </div>
        <div> Dirección: <label  id="direccion"> </label > </div>
        <div> Departamento: <label  id="departamento"> </label ></div>
  </div>
</div>

<script>

$("#pruebaruc").click(function(){
    var ruc=$("#ruc").val();
    $.ajax({           
    type:"POST",
    url: "consultar-ruc-ajax.php",
    data: 'ruc='+ruc,
    dataType: 'json',
    success: function(data) {
  
    
        if(data==1)
        {
            alert('El RUC tiene que tener 11 digitos');
        }
        else{
            console.log(data);
          
            $("#rucNumero").html(data.numeroDocumento);
            $("#razonsocial").html(data.nombre);
            $("#estado").html(data.estado);

            $("#direccion").html(data.direccion);
            $("#departamento").html(data.departamento);
        }
 

    }
});

})

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
   