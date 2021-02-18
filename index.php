<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="/public/favicon.ico">  

     <!--Librerias Sweet-->
     <link rel="stylesheet" href="/Resources/sweet/sweetalert2.min.css">

    <!--Estilos Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    

    <!--Estilos personalizados-->
    <link rel="stylesheet" href="/Resources/css/style.css">
</head>
<body>

    <div class="content">
        <label for="img" class="button"></label>        
    </div>

    <div class="container">
        
        <div class="row">
            <div class="col-lg-4 col-md-8 m-auto">
                
                <div class="card d-none" id="vistaPrevia">
                    <div class="card-body">
                        <form method="post" action="" id="frmImg">
                            <input type="text" name="opcion" value="insert" style="display:none">
                            <input type="file" name="imagen" id="img" class="d-none">
                            <img src="" alt="" id="imgPrevia" class="img-thumbnail">
                            <div class="form-group">
                                <label for="comentario">Comentario</label>
                                <textarea id="comentario" name="comentario" class="form-control" rows="3"></textarea>
                            </div> 
                            <button class="btn btn-primary" id="publicar">Publicar</button>
                        </form>
                    </div>
                </div>

            </div>    
        </div>

        <div class="row mt-5">
            <h1 class="text-center text-dark">Publicaciones</h1>
            <div id="resultado" class="row">            
           
        </div>      

    </div>
  
    <script src="/Resources/sweet/sweetalert2.min.js"></script>
    <script type="module" src="/Resources/js/script.js"></script>

</body>
</html>