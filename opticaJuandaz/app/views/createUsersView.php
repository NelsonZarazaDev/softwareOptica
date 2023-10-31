<?php
class createUsersView
{
    function paginateCreateUsers()
    {
?>
        <script>
            document.getElementById("textInfo").innerHTML = "Crear Usuarios";
        </script>

        <form id="insert_User">
            <div class="container imgCreate col-12 col-lg-12 mt-3" id="result"></div>
            <div class="col d-flex flex-sm-column justify-content-between">
                <input type="file" class="textInputCreate col-8 col-lg-4 p-2 mb-2 mt-2" name="photo_person" id="photo_person" accept="image/*">
            </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-3 text-sm-start">
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="nombre" class="textLabelCreate">Nombre:</label>
                    <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="name" name="name" required>
                    <div class="error" id="error-nombre"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="apellidos" class="textLabelCreate">Apellidos:</label>
                    <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="surname" name="surname" required>
                    <div class="error" id="error-apellidos"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="apellidos" class="textLabelCreate">Documento:</label>
                    <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="document" name="document" required>
                    <div class="error" id="error-apellidos"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="apellidos" class="textLabelCreate">Fecha de nacimiento:</label>
                    <input type="date" class="textInputCreate col-8 col-lg-10 p-2" id="birth_date" name="birth_date" required>
                    <div class="error" id="error-apellidos"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="apellidos" class="textLabelCreate">Fecha de ingreso:</label>
                    <input type="date" class="textInputCreate col-8 col-lg-10 p-2" id="admission" name="admission" required>
                    <div class="error" id="error-apellidos"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="email" class="textLabelCreate">Telefono:</label>
                    <input type="tel" class="textInputCreate col-8 col-lg-10 p-2" id="phone" name="phone" required>
                    <div class="error" id="error-email"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="email" class="textLabelCreate">Años de experiencia:</label>
                    <input type="number" class="textInputCreate col-8 col-lg-10 p-2" id="years_experience" name="years_experience" required>
                    <div class="error" id="error-email"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="email" class="textLabelCreate">Correo:</label>
                    <input type="email" class="textInputCreate col-8 col-lg-10 p-2" id="email" name="email" required>
                    <div class="error" id="error-email"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="direccion" class="textLabelCreate">Dirección:</label>
                    <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="address" name="address" required>
                    <div class="error" id="error-direccion"></div>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="sexo" class="textLabelCreate">Sexo:</label>
                    <select id="sex" class="textInputCreate textInputSelect col-8 col-lg-10 p-2" name="sex" required>
                        <option class="textInputCreate p-2" selected></option>
                        <option class="textInputCreate p-2" value="M">Masculino</option>
                        <option class="textInputCreate p-2" value="F">Femenino</option>
                    </select>
                </div>
                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="password" class="textLabelCreate">Contraseña:</label>
                    <input type="password" class="textInputCreate col-8 col-lg-10 p-2" id="password" name="password" required>
                    <div class="error" id="error-password"></div>
                </div>

                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="sexo" class="textLabelCreate">Rol:</label>
                    <select id="id_role" class="textInputCreate textInputSelect col-8 col-lg-10 p-2" name="id_role" required>
                        <option class="textInputCreate p-2" selected></option>
                        <option class="textInputCreate p-2" value="R0000">Secretaria</option>
                        <option class="textInputCreate p-2" value="R0001">Due&ntilde;a</option>
                        <option class="textInputCreate p-2" value="R0002">Optometra</option>
                        <option class="textInputCreate p-2" value="R0003">Administrador del sistema</option>
                    </select>
                </div> 

                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="sexo" class="textLabelCreate">Pais:</label>
                    <select id="id_country" class="textInputCreate textInputSelect col-8 col-lg-10 p-2" name="id_country" required>
                        <option class="textInputCreate p-2" selected></option>
                        <option class="textInputCreate p-2" value="1">Colombia</option>
                    </select>
                </div> 

                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="sexo" class="textLabelCreate">Departamento:</label>
                    <select id="id_departament" class="textInputCreate textInputSelect col-8 col-lg-10 p-2" name="id_departament" required>
                        <option class="textInputCreate p-2" selected></option>
                        <option class="textInputCreate p-2" value="1">Norte de dantander</option>
                    </select>
                </div>

                <div class="col d-flex flex-sm-column justify-content-between">
                    <label for="sexo" class="textLabelCreate">Ciudad:</label>
                    <select id="id_city" class="textInputCreate textInputSelect col-8 col-lg-10 p-2" name="id_city" required>
                        <option class="textInputCreate p-2" selected></option>
                        <option class="textInputCreate p-2" value=" 1">Ocaña</option>
                        <option class="textInputCreate p-2" value=" 2">Tarra</option>
                    </select>
                </div>
            </div>
            <div class="justify-content-lg-start mt-3">
                <button type="button" class="align-items-center buttonUserRegister col-10 col-lg-2 mt-2 p-2 d-flex justify-content-center" onclick="Administrador.insertUser()"><i class="bi bi-person-plus me-2"></i>Crear</button>
        </form>

<?php
    }
}
?>

<script>
    document.getElementById("textInfo").innerHTML = "Crear Usuarios";
    const inputFile = document.getElementById('photo_person');
    const resultDiv = document.getElementById('result');
    const reader = new FileReader();

    inputFile.addEventListener('change', handleFileChange);
    reader.addEventListener('load', showPreview);

    function handleFileChange(event) {
        resultDiv.innerHTML = '';
        const [imageFile] = event.currentTarget.files;
        reader.readAsDataURL(imageFile);
    }

    function showPreview(event) {
        const previewImage = new Image();
        previewImage.src = event.currentTarget.result;
        resultDiv.appendChild(previewImage);
    }
</script>