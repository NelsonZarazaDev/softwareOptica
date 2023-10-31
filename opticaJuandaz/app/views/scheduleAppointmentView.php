<?php
class scheduleAppointmentView
{
    function paginateScheduleAppointment()
    {
?>

        <script>
            document.getElementById("textInfo").innerHTML = "Reserva de citas";
        </script>

        <div class="card-body mt-1">
            <form id="">
                <div class="row row-cols-lg-3">
                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Nombres:</label>
                        <input class="textInputCreate p-2" type="text" name="" id="">
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Apellidos</label>
                        <input class="textInputCreate p-2" type="text" name="" id="">
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Documento</label>
                        <input class="textInputCreate p-2" type="text" name="" id="">
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Telefono</label>
                        <input class="textInputCreate p-2" type="tel" name="" id="">
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Hora</label>
                        <input class="textInputCreate p-2" type="time" name="" id="time">
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label class="textLabelCreate">Fecha</label>
                        <input class="textInputCreate p-2" type="date" name="" id="">
                    </div>
                </div>
                <button type="button" class="align-items-center buttonUserRegister col-10 col-lg-2 mt-3 p-2 d-flex justify-content-center"><i class="bi bi-cursor me-2"></i>Crear</button>
            </form>
        </div>
        <hr class="hrInfo">
        <div id="external-events"></div>
        <div class="col-12 pt-3 pb-3">
            <div id="calendar"></div>
        </div>
        <script>
            $(function() {

                /* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (https://fullcalendar.io/docs/event-object)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        }

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject)

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0 //  original position after the drag
                        })

                    })
                }

                ini_events($('#external-events div.external-event'))

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                var date = new Date()
                var d = date.getDate(),
                    m = date.getMonth(),
                    y = date.getFullYear()

                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;

                var containerEl = document.getElementById('external-events');
                var checkbox = document.getElementById('drop-remove');
                var calendarEl = document.getElementById('calendar');



                // initialize the external events
                // -----------------------------------------------------------------

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

                var calendar = new Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    themeSystem: 'bootstrap',
                    //Random default events
                    events: [{
                        title: 'Nelson Mauricio Navarro Zaraza' + '-' + '1007977211',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 12, 30),
                        allDay: false,
                        backgroundColor: '#042256', //Info (aqua)
                        borderColor: '#042256' //Info (aqua)
                    }],
                    editable: false,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(info) {
                        // is the "remove after drop" checkbox checked?
                        if (checkbox.checked) {
                            // if so, remove the element from the "Draggable Events" list
                            info.draggedEl.parentNode.removeChild(info.draggedEl);
                        }
                    }
                });
                calendar.render();
                // $('#calendar').fullCalendar()

                /* ADDING EVENTS */

                $('#add-new-event').click(function(e) {
                    e.preventDefault()
                    // Get value and make sure it is not null
                    var val = $('#new-event').val()
                    if (val.length == 0) {
                        return
                    }

                    // Create events
                    var event = $('<div />')
                    event.css({
                        'background-color': currColor,
                        'border-color': currColor,
                        'color': '#fff'
                    }).addClass('external-event')
                    event.text(val)
                    $('#external-events').prepend(event)

                    // Add draggable funtionality
                    ini_events(event)

                    // Remove event from text input
                    $('#new-event').val('')
                })
            })
        </script>



<?php
    }
}
?>