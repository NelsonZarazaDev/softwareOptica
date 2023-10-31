<?php
class ClinicHistory
{
    function paginateClinicHistory()
    {
?>
        <script>
            document.getElementById("textInfo").innerHTML = "Crear historia clinica";
        </script>

        <div class="card-body mt-4 mb-4 ms-3">
            <form id="formSearch">
                <div class="row row-cols-2 justify-content-between">

                    <button type="button" class="col-12 buttonCreateHistory align-items-center col-lg-2 p-2 d-flex justify-content-center mb-2 ml-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-person-add me-2 icon"></i> Crear
                    </button>

                    <div class="d-flex col-12 col-lg-3" id="">
                        <input type="text" id="search" name="search" class="col inputSearch p-2" placeholder="Codigo, Documento, Email">
                        <button type="button" class="search input-group-text" onclick="">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                </div>
            </form>
        </div>


        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="text-center">
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Documento</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Telefono</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Edad</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Nombre</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Fecha de nacimiento</th>
                        <th class="textTableHeaderSearch" style="text-align:center; background-color:#cbedf6;">Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1007977211</td>
                        <td>3157465208</td>
                        <td>20</td>
                        <td>Nelson Mauricio Navarro Zaraza</td>
                        <td>04/06/2003</td>
                        <td class="textTableSearch" style="text-align:center;">
                            <i class="bi bi-pencil-square" onclick="Administrador.showSearchUsers('<?php echo $token_access ?>')"></i>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>1007977212</td>
                        <td>3157465208</td>
                        <td>20</td>
                        <td>Nelson Mauricio Navarro Zaraza</td>
                        <td>04/06/2003</td>
                        <td class="textTableSearch" style="text-align:center;">
                            <i class="bi bi-pencil-square" onclick="Administrador.showSearchUsers('<?php echo $token_access ?>')"></i>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            </ul>
        </nav>





        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear historia clinica</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="card">
                            <div class="card-body">
                                <form id="update_User" class="row row-cols-1 row-cols-md-2 g-2">
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Nombres</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Apellidos</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Documento</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Telefono</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Direccion</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Fecha de nacimiento</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Entidad</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Edad</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Ocupacion</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Nombres acompa&ntilde;ante</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Apellidos acompa&ntilde;ante</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Telefono acompa&ntilde;ante</label>
                                        <input type="text" name="" id="" class="form-control inputMedicalHistory">
                                    </div>

                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Motivo de consulta</label>
                                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory"></textarea>
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Antecedentes personales</label>
                                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory"></textarea>
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Antecedentes oculares</label>
                                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory"></textarea>
                                    </div>
                                    <div class="col-lg-6 justify-content-between">
                                        <label class="textMedicalHistoryLabel">Antecedentes familiares</label>
                                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory"></textarea>
                                    </div>



                                    <button type="button" class="align-items-center m-2 col-10 col-lg-4   mt-2 p-2 justify-content-center buttonSearch" onclick="">
                                        <i class="bi bi-floppy me-2 ms-2"></i> Guardar
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="public/js/function.js"></script>

<?php
    }
}
?>
<script></script>
