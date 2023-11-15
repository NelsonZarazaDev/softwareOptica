<?php
class scheduleAppointmentView
{
    function paginateScheduleAppointment($arraySchedule,$array_department,$array_city)
    {
?>

        <script>
            document.getElementById("textInfo").innerHTML = "Reserva de citas";
        </script>

        <div class="card-body mt-1">
            <form id="insert_schedule">
                <div class="row row-cols-lg-3">

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Nombres:</label>
                        <input class="textInputCreate text p-2" type="text" name="name" id="name">
                    </div>

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Apellidos:</label>
                        <input class="textInputCreate text p-2" type="text" name="surname" id="surname">
                    </div>

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Documento:</label>
                        <input class="textInputCreate text p-2" type="text" name="document" id="document">
                    </div>

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Telefono:</label>
                        <input class="textInputCreate text p-2" type="text" name="phone" id="phone">
                    </div>

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Hora:</label>
                        <select class="textInputCreate textInputSelect p-2" name="hour" id="hour" required>
                            <option class="p-2" value=""></option>
                            <option class="p-2" value="08:00:00">08:00:00</option>
                            <option class="p-2" value="08:30:00">08:30:00</option>
                            <option class="p-2" value="09:00:00">09:00:00</option>
                            <option class="p-2" value="09:30:00">09:30:00</option>
                            <option class="p-2" value="10:00:00">10:00:00</option>
                            <option class="p-2" value="10:30:00">10:30:00</option>
                            <option class="p-2" value="11:00:00">11:00:00</option>
                            <option class="p-2" value="11:30:00">11:30:00</option>
                            <option class="p-2" value="12:00:00">12:00:00</option>
                            <option class="p-2" value="14:00:00">02:00:00</option>
                            <option class="p-2" value="14:30:00">02:30:00</option>
                            <option class="p-2" value="15:00:00">03:00:00</option>
                            <option class="p-2" value="15:30:00">03:30:00</option>
                            <option class="p-2" value="16:00:00">04:00:00</option>
                            <option class="p-2" value="16:30:00">04:30:00</option>
                            <option class="p-2" value="17:00:00">05:00:00</option>
                            <option class="p-2" value="17:30:00">05:30:00</option>
                            <option class="p-2" value="18:00:00">06:00:00</option>
                        </select>
                    </div>

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Fecha</label>
                        <input class="textInputCreate text p-2" type="date" name="date" id="date">
                    </div>

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Departamento:</label>
                        <select class="textInputCreate textInputSelect p-2" name="id_department" id="id_department" required>
                            <option value=""></option>
                            <?php
                            if ($array_department) {
                                foreach ($array_department as $object_department) {
                                    $id_department = $object_department['id_department'];
                                    $name_department = $object_department['name_department'];
                            ?>
                                    <option class="textInputCreate p-2" value="<?php echo $id_department; ?>"><?php echo $name_department; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Ciudad:</label>
                        <select class="textInputCreate textInputSelect p-2" name="id_city" id="id_city" required>
                            <option value=""></option>
                            <?php
                            if ($array_city) {
                                foreach ($array_city as $object_city) {
                                    $id_city = $object_city['id_city'];
                                    $name_city = $object_city['name_city'];
                            ?>
                                    <option class="textInputCreate p-2" value="<?php echo $id_city; ?>"><?php echo $name_city; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <button type="button" class="align-items-center buttonUserRegister col-10 col-lg-2 mt-4 p-2 d-flex justify-content-center" onclick="Schedule.insertSchedule()">
                    <i class="bi bi-cursor me-2"></i>Crear
                </button>
            </form>
        </div>
        <hr class="hrInfo">

        <div id="external-events"></div>
        <div class="col-12 pt-3 pb-3">
            <div id="calendar"></div>
        </div>

        <script>
            $(function() {
                function ini_events(ele) {
                    ele.each(function() {
                        var eventObject = {
                            title: $.trim($(this).text())
                        };

                        $(this).data('eventObject', eventObject);

                        $(this).draggable({
                            zIndex: 1070,
                            revert: true,
                            revertDuration: 0
                        });
                    });
                }

                ini_events($('#external-events div.external-event'));

                var date = new Date();
                var d = date.getDate(),
                    m = date.getMonth(),
                    y = date.getFullYear();

                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;

                var containerEl = document.getElementById('external-events');
                var checkbox = document.getElementById('drop-remove');
                var calendarEl = document.getElementById('calendar');
                var eventsArray = []; // Array para almacenar eventos

                new Draggable(containerEl, {
                    itemSelector: '.external-event',
                    eventData: function(eventEl) {
                        return {
                            title: eventEl.innerText,
                            backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                            borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                            textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                        };
                    }
                });

                // Utiliza un foreach para generar eventos con las nuevas fechas y horas
                <?php foreach ($arraySchedule as $object_schedule) : ?>
                    var fecha = '<?php echo ($object_schedule['date_quote']); ?>';
                    var hora = '<?php echo ($object_schedule['hour_quote']); ?>';
                    var name = '<?php echo ($object_schedule['name_person']); ?>';
                    var surname = '<?php echo ($object_schedule['surname_person']); ?>';
                    var phone = '<?php echo ($object_schedule['phone_person']); ?>';

                    // Parsea la fecha en el formato "DD/MM/YYYY"
                    var dateParts = fecha.split("-");
                    var timeParts = hora.split(":");

                    if (dateParts.length === 3 && timeParts.length === 3) {
                        var day = parseInt(dateParts[2], 10);
                        var month = parseInt(dateParts[1], 10) - 1; // Resta 1 al mes
                        var year = parseInt(dateParts[0], 10);
                        var hour = parseInt(timeParts[0], 10);
                        var minutes = parseInt(timeParts[1], 10);
                        var seconds = parseInt(timeParts[2], 10);

                        if (!isNaN(day) && !isNaN(month) && !isNaN(year) && !isNaN(hour) && !isNaN(minutes) && !isNaN(seconds)) {
                            var event = {
                                title: name + ' ' + surname + ' - ' + phone,
                                start: new Date(year, month, day, hour, minutes, seconds),
                                end: new Date(year, month, day, hour, (minutes + 30), seconds),
                                allDay: true,
                                backgroundColor: '#042256',
                                borderColor: '#042256',
                                textColor: '#fff',
                                token: '<?php echo ($object_schedule['token_quote']); ?>'
                            };
                            eventsArray.push(event); // Agrega el evento al array
                        }

                    }
                <?php endforeach; ?>


                // Una vez fuera del bucle, asigna los eventos al calendario
                var calendar = new Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    themeSystem: 'bootstrap',
                    events: eventsArray, // Agrega los eventos al calendario
                    editable: false,
                    droppable: true,
                    drop: function(info) {
                        if (checkbox.checked) {
                            info.draggedEl.parentNode.removeChild(info.draggedEl);
                        }
                    },
                    // Agrega el manejador de eventos eventClick
                    eventClick: function(info) {
                        var token = info.event.extendedProps.token;
                        Schedule.showSchedule(token);
                    }

                });

                calendar.render();

            });




            // Obtén el elemento del campo de fecha
            var datePicker = document.getElementById("date");

            // Obtiene la fecha actual en formato ISO (AAAA-MM-DD)
            var today = new Date().toISOString().split("T")[0];

            // Establece la fecha mínima (mínimo seleccionable) en el campo de entrada de fecha
            datePicker.setAttribute("min", today);
        </script>




    <?php
    }
    function showSchedule($array_schedule)
    {
        $date_quote = $array_schedule[0]['date_quote'];
        $hour_quote = $array_schedule[0]['hour_quote'];
        $name_person = $array_schedule[0]['name_person'];
        $surname = $array_schedule[0]['surname_person'];
        $document_person = $array_schedule[0]['document_person'];
        $phone_person = $array_schedule[0]['phone_person'];
        $token = $array_schedule[0]['token_quote'];
        $id_person = $array_schedule[0]['id_person'];
    ?>
        <div class="card">
            <div class="card-body">
                <form id="update_schedule" class="row">
                    <input type="hidden" class="form-control textUpdateSearch" textUpdateSearch" id="token" name="token" value="<?php echo $token; ?>" readonly>
                    <input type="hidden" class="form-control textUpdateSearch" textUpdateSearch" id="id_person" name="id_person" value="<?php echo $id_person; ?>" readonly>
                    <input type="hidden" class="form-control textUpdateSearch" textUpdateSearch" id="current_phone" name="current_phone" value="<?php echo $phone_person; ?>" readonly>
                    <input type="hidden" class="form-control textUpdateSearch" textUpdateSearch" id="current_hour" name="current_hour" value="<?php echo $hour_quote; ?>" readonly>
                    <input type="hidden" class="form-control textUpdateSearch" textUpdateSearch" id="current_date" name="current_date" value="<?php echo $date_quote; ?>" readonly>


                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Nombres</label>
                        <input type="text" class="form-control textUpdateSearch" textUpdateSearch" id="name_person" name="name_person" value="<?php echo $name_person; ?>" readonly>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Apellidos</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" surname" name="surname" value="<?php echo $surname;  ?>" readonly>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Documento</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" document_person" name="document_person" value="<?php echo $document_person;  ?>" readonly>
                    </div>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Telefono</label>
                        <input type="number" class="form-control textUpdateSearch"" id=" phone_person" name="phone_person" value="<?php echo $phone_person;  ?>" maxlength="10">
                    </div>

                    <div class="col-lg-6 d-flex flex-column">
                        <label class="textLabelCreate">Hora:</label>
                        <select class="textInputCreate textInputSelectModal p-2" name="hour_quote" id="hour_quote" required>
                            <option class="p-2" value="<?php echo $hour_quote; ?>"><?php echo $hour_quote; ?></option>
                            <option class="p-2" value="08:00:00">08:00:00</option>
                            <option class="p-2" value="08:30:00">08:30:00</option>
                            <option class="p-2" value="09:00:00">09:00:00</option>
                            <option class="p-2" value="09:30:00">09:30:00</option>
                            <option class="p-2" value="10:00:00">10:00:00</option>
                            <option class="p-2" value="10:30:00">10:30:00</option>
                            <option class="p-2" value="11:00:00">11:00:00</option>
                            <option class="p-2" value="11:30:00">11:30:00</option>
                            <option class="p-2" value="12:00:00">12:00:00</option>
                            <option class="p-2" value="14:00:00">02:00:00</option>
                            <option class="p-2" value="14:30:00">02:30:00</option>
                            <option class="p-2" value="15:00:00">03:00:00</option>
                            <option class="p-2" value="15:30:00">03:30:00</option>
                            <option class="p-2" value="16:00:00">04:00:00</option>
                            <option class="p-2" value="16:30:00">04:30:00</option>
                            <option class="p-2" value="17:00:00">05:00:00</option>
                            <option class="p-2" value="17:30:00">05:30:00</option>
                            <option class="p-2" value="18:00:00">06:00:00</option>
                        </select>
                    </div>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Fecha</label>
                        <input class="form-control textUpdateSearch" type="date" name="date_quote" id="date_quote" value="<?php echo $date_quote;   ?>">
                    </div>



            </div>
            <input type="hidden" id="token" name="token" value="<?php echo $token;  ?>">
            <input type="hidden" id="id_person" name="id_person" value="<?php echo $id_person;  ?>">
            <input type="hidden" id="phone_person" name="phone_person" value="<?php echo $phone_person;  ?>">
            <input type="hidden" id="hour_quote" name="hour_quote" value="<?php echo $hour_quote;  ?>">
            <input type="hidden" id="date_quote" name="date_quote" value="<?php echo $date_quote;  ?>">

            <div class="d-flex flex-sm-column flex-lg-row">
                <button type="button" class="align-items-center m-2 col-10 col-lg-4 d-flex mt-2 p-2 justify-content-center buttonSearch" onclick="Schedule.updateSchedule()">
                    <i class="bi bi-floppy me-2 ms-2"></i> Guardar
                </button>

                <button type="button" class="align-items-center m-2 col-10 col-lg-4 d-flex mt-2 p-2 justify-content-center buttonDelete" onclick="Schedule.deleteSchedule()">
                    <i class="bi bi-trash3 me-2 ms-2"></i> Eliminar
                </button>
            </div>
            </form>
        </div>
        </div>
        <script>
            // Obtén el elemento del campo de fecha
            var datePicker = document.getElementById("date_quote");

            // Obtiene la fecha actual en formato ISO (AAAA-MM-DD)
            var today = new Date().toISOString().split("T")[0];

            // Establece la fecha mínima (mínimo seleccionable) en el campo de entrada de fecha
            datePicker.setAttribute("min", today);
        </script>
<?php
    }
}
?>