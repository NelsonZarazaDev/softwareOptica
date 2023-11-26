<?php
class checkAppointmentScheduleView
{
    function paginateCheckAppointmentSchedule($arraySchedule)
    {
?>

        <script>
            document.getElementById("textInfo").innerHTML = "Reserva de citas";
        </script>

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
                        Schedule.showCheckAppointmentSchedule(token);
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
    function showCheckAppointmentSchedule($array_schedule)
    {
        $date_quote = $array_schedule[0]['date_quote'];
        $hour_quote = $array_schedule[0]['hour_quote'];
        $name_person = $array_schedule[0]['name_person'];
        $surname = $array_schedule[0]['surname_person'];
        $document_person = $array_schedule[0]['document_person'];
        $phone_person = $array_schedule[0]['phone_person'];
        $name_access=$array_schedule[0]['name_access'];
        $surname_access=$array_schedule[0]['surname_access'];
    ?>
        <div class="card">
            <div class="card-body">
                <form id="update_schedule" class="row gx-5 gy-3">
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Nombres</label>
                        <input type="text" class="form-control textUpdateSearch" textUpdateSearch" id="name_person" name="name_person" value="<?php echo $name_person; ?>" disabled>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Apellidos</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" surname" name="surname" value="<?php echo $surname;  ?>" disabled>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Documento</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" document_person" name="document_person" value="<?php echo $document_person;  ?>" disabled>
                    </div>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Telefono</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" document_person" name="document_person" value="<?php echo $phone_person;  ?>" disabled>
                    </div>

                    <div class="col-lg-6 d-flex flex-column">
                        <label class="textLabelCreate">Hora:</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" document_person" name="document_person" value="<?php echo $hour_quote;  ?>" disabled>

                    </div>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Fecha</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" document_person" name="document_person" value="<?php echo $date_quote;  ?>" disabled>
                    </div>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Optometra:</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" document_person" name="document_person" value="<?php echo $name_access." ".$surname_access;  ?>" disabled>
                    </div>

            </div>


        </div>
        </div>
        <script>
            var datePicker = document.getElementById("date_quote");
            var today = new Date().toISOString().split("T")[0];
            datePicker.setAttribute("min", today);
        </script>
<?php
    }
}
?>