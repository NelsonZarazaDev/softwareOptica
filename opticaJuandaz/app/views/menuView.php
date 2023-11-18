<?php
class menuView
{
    function showMenu()
    {
        $id_role = $_SESSION['id_role'];
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="public/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="assets/fullcalendar/main.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="assets/toastr/toastr.min.css">
            <link rel="stylesheet" href="public/css/menu.css">
            <title>Optica Juandaz</title>
            <link rel="shortcut icon" href="public/img/favicon.png" type="image/x-icon">
        </head>

        <body>
            <div class="userInfoBar p-2 container-fluid">
                <button class="navbar-toggler d-block d-md-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar">
                    <i class="barIcon bi bi-list"></i>
                </button>

                <b class="tabText fs-1 text-center col-lg-11" id="textInfo"></b>

                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-2  text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="public/img/<?php echo $_SESSION['name_access']; ?>.jpg" alt="mdo" width="50" height="50" class="rounded-circle">
                    </a>

                    <ul class="dropdown-menu text-small shadow">
                        <a class="dropdownClose" href="#" role="button" onclick="Menu.closeSession()">Cerrar sesi&oacute;n</a>
                    </ul>
                </div>
            </div>

            <div class="container p-0 m-0 mw-100">
                <div class="row m-0">

                    <div class="sidebar navbar-expand-lg col-12 col-lg-2 m-0 p-0">
                        <div class="container pt-4">
                            <div class="collapse navbar-collapse h-100 m-0 pt-5 align-items-start" id="sidebar">
                                <div class="d-flex flex-column sidebarSize">
                                    <img src="public/img/Logo.png" alt="Logo" class="img-fluid p-3">
                                    <?php if ($id_role == "R0000") { ?>
                                        <!-- Secretaria -->
                                        <hr>
                                        <a type="button" data-bs-toggle="collapse" data-bs-target="#collapseListNav1" aria-expanded="true" aria-controls="collapseList" class="boldFont sidebarTextColor"><i class="bi bi-clipboard-pulse sidebarIcon"></i>Historias Cl&iacute;nicas</a>
                                        <div class="collapse collapse-horizontal optionsNav" id="collapseListNav1">
                                            <ul>
                                                <li class="boldFont"><a href="#" class="sidebarTextColor" onclick="Menu.menu('clinicHistoryController/paginateClinicHistory')">Historia Clinica</a></li>
                                                <li class="boldFont"><a href="#" class="sidebarTextColor" onclick="Menu.menu('searchMedicalHistoryController/paginateSearchMedicalHistory')">Buscar</a></li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <li>
                                            <a href="#" class="boldFont sidebarTextColor" onclick="Menu.menu('scheduleAppointmentController/paginateScheduleAppointment')">
                                                <i class="bi bi-calendar4 sidebarIcon"></i>
                                                Reserva Cita Medica
                                            </a>
                                        </li>
                                        <hr>
                                        <li>
                                            <a href="#" class="boldFont sidebarTextColor" onclick="Menu.menu('personalInformationController/paginatePersonalInformation')">
                                                <i class="bi bi-person sidebarIcon"></i>
                                                Informaci&oacute;n Personal
                                            </a>
                                        </li>
                                        <hr>
                                    <?php } ?>
                                    <?php if ($id_role == "R0001") { ?>
                                        <!-- Dueña -->
                                        <a type="button" data-bs-toggle="collapse" data-bs-target="#collapseListNav2" aria-expanded="true" aria-controls="collapseList" class="boldFont sidebarTextColor"><i class="bi bi-clipboard-pulse sidebarIcon"></i>Historias Cl&iacute;nicas</a>
                                        <div class="collapse collapse-horizontal optionsNav" id="collapseListNav2">
                                            <ul>
                                                <li class="boldFont"><a href="#" class="sidebarTextColor" onclick="Menu.menu('searchMedicalHistoryController/paginateSearchMedicalHistory')">Buscar</a></li>
                                            </ul>
                                        </div>
                                        <hr>

                                        <li>
                                            <a href="#" class="boldFont sidebarTextColor" onclick="Menu.menu('checkAppointmentScheduleController/paginateCheckAppointmentSchedule')">
                                                <i class="bi bi-calendar4 sidebarIcon"></i>
                                                Reserva Cita Medica
                                            </a>
                                        </li>
                                        <hr>

                                        <li>
                                            <a href="#" class="boldFont sidebarTextColor" onclick="Menu.menu('statisticsController/paginateStatistics')">
                                                <i class="bi bi-graph-up-arrow sidebarIcon"></i>
                                                Estadistica
                                            </a>
                                        </li>
                                        <hr>

                                        <li>
                                            <a href="#" class="boldFont sidebarTextColor" onclick="Menu.menu('personalInformationController/paginatePersonalInformation')">
                                                <i class="bi bi-person sidebarIcon"></i>
                                                Informaci&oacute;n Personal
                                            </a>
                                        </li>
                                        <hr>
                                    <?php } ?>
                                    <?php if ($id_role == "R0002") { ?>
                                        <!-- Optometra -->
                                        <a type="button" data-bs-toggle="collapse" data-bs-target="#collapseListNav3" aria-expanded="true" aria-controls="collapseList" class="boldFont sidebarTextColor"><i class="bi bi-clipboard-pulse sidebarIcon"></i>Historias Cl&iacute;nicas</a>
                                        <div class="collapse collapse-horizontal optionsNav" id="collapseListNav3">
                                            <ul>
                                                <li class="boldFont"><a href="#" class="sidebarTextColor" onclick="Menu.menu('')">Historia Clinica</a></li>
                                                <li class="boldFont"><a href="#" class="sidebarTextColor" onclick="Menu.menu('')">Buscar</a></li>
                                            </ul>
                                        </div>
                                        <hr>

                                        <li>
                                            <a href="#" class="boldFont sidebarTextColor" onclick="Menu.menu('personalInformationController/paginatePersonalInformation')">
                                                <i class="bi bi-person sidebarIcon"></i>
                                                Informaci&oacute;n Personal
                                            </a>
                                        </li>
                                        <hr>
                                    <?php } ?>
                                    <?php if ($id_role == "R0003") { ?>
                                        <!--  Administrador del sistema -->
                                        <a type="button" data-bs-toggle="collapse" data-bs-target="#collapseListNav4" aria-expanded="true" aria-controls="collapseList" class="boldFont sidebarTextColor"><i class="bi bi-people sidebarIcon"></i>Usuarios del sitema</a>
                                        <div class="collapse collapse-horizontal optionsNav" id="collapseListNav4">
                                            <ul>
                                                <li class="boldFont"><a href="#" class="sidebarTextColor" onclick="Menu.menu('createUsersController/paginateCreateUsers')">Registrar</a></li>
                                                <li class="boldFont"><a href="#" class="sidebarTextColor" onclick="Menu.menu('searchUsersController/paginateSearchUsers')">Buscar</a></li>
                                            </ul>
                                        </div>
                                        <hr>

                                        <li>
                                            <a href="#" class="boldFont sidebarTextColor" onclick="Menu.menu('personalInformationController/paginatePersonalInformation')">
                                                <i class="bi bi-person sidebarIcon"></i>
                                                Informaci&oacute;n Personal
                                            </a>
                                        </li>
                                        <hr>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div id="my_modal" class="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-xl mt-5 pt-5">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title textTableHeaderSearch" id="modal_title"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div id="modal_content" class="modal-body">
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="content p-lg-5 col-12 col-lg-10">
                        <div class="container pt-5">
                            <div id="content">
                                <div class="col-6 col-lg-12 welcome">¡ BIENVENIDOS !</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <footer class="footer mt-auto py-3">
                <div class="container text-center">
                    <span class="text-light">&copy; Inges. UFPSO</span>
                </div>
            </footer>

            <script src="public/bootstrap-5.3.2/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="assets/jquery/jquery.min.js"></script>
            <script src="assets/toastr/toastr.min.js"></script>
            <script src="assets/jquery-ui/jquery-ui.min.js"></script>
            <script src="assets/sweetalert2/sweetalert2.min.js"></script>
            <script src="assets/sweetalert2/sweetalert2.all.min.js"></script>
            <script src="assets/moment/moment.min.js"></script>
            <script src="assets/fullcalendar/main.js"></script>
            <script src="public/js/Menu.js"></script>
            <script src="public/js/systemAdministrator.js"></script>
            <script src="public/js/secretary.js"></script>
            <script src="public/js/scheduleAppointment.js"></script>
            <script src="public/chart.js/Chart.min.js"></script>

        </body>

        </html>
<?php
    }
}
?>