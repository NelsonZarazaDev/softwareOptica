<?php
class loginView
{
    function showFormSession()
    {
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="public/css/login.css">
            <title>Optica Juandaz</title>
            <link rel="stylesheet" href="css/login.css">
            <link rel="shortcut icon" href="public/img/favicon.png" type="image/x-icon">



        <body>

            <div id="formContainer" class="formContainer container-fluid">
                <form action="" method="post" class="form">
                    <div class="startText"><b>Iniciar sesi&oacute;n</b></div>
                    <input type="email" class="emailContainer col-10 col-lg-10" id="email" name="email" placeholder="Email">
                    <input type="password" class="passwordContainer col-10 col-lg-10" id="password" name="password" placeholder="Contrase&ntilde;a">
                    <div id="passwordMessage"></div>
                    <div class="button">
                        <button type="submit" class="buttonSubmit btn-block col-6 col-lg-6" id="buttinLogin">Enviar</button>
                    </div>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        </body>

        </html>


        <script src="assets/jquery/jquery.min.js"></script>
        <script src="assets/sweetalert2/sweetalert2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>

        </html>
        <script src="public/js/login.js"></script>


<?php
    }
}
?>