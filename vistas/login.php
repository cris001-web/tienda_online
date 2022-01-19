<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></link> 
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"></link>

        
        <!-- bootstrap js -->
        w<script type="text/javascript"   src="../libreria/bootstrap4/js/bootstrap.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
         <link rel="stylesheet" href="../css/estilo_login.css"></link>
        
        
    </head>
    <body class="row align-items-center vh-100 ">
        <div class=" col-sm-6 modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    
                    <form action="../vistas/validar.php" 5class="col-12"  method="post">
                        <div class="form-group mt-5" >
                            <input type="text" class="form-control" name="usuario"  placeholder="Nombre del Usuario"/>
                        </div>
                        <div class="form-group" id="contraseña-group">
                            <input type="password" class="form-control" name="pass"  placeholder="Contraseña"/>
                        </div>
                       
                         <div class="form-group" style="width: 23px;">
                            <div class="g-recaptcha"  data-sitekey="6LcKtsgZAAAAAGsJrISuLNUv4WoYpN0L5x-sCrrT"></div>
                        </div>
                        
                        
                        
                        <button type="submit" class="btnIngresar btn btn-primary">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>