<script src='{$SITE_URL}assets/fullcalendar/lib/moment.min.js'></script>
<script src='{$SITE_URL}assets/fullcalendar/lib/jquery-ui.custom.min.js'></script>
<script src='{$SITE_URL}assets/fullcalendar/fullcalendar.min.js'></script>





<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h2>Agenda</h2>
                <a class="topbut btn btn-success" data-toggle="modal" data-target="#newcalevent" >Add Event</a>
            </div>

            <div class="panel-body">
                <div id="calwrap">
                    <div class="widget-block  white-box calendar-box">
                        <div class="col-md-12 blue-box calendar no-padding">
                            <div id='wrap'>
                                <div id='calendar'></div>
                                <div style='clear:both'></div>
                            </div>
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
     </div>
</div>

</div>

<script type="text/javascript">
    init.push(function () {

        $('.widget-jobdetails').hide();
        $( "#external-events select" ).change( function() {
            $('.widget-jobdetails').fadeIn();
        });
        // Javascript code here
        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events .fc-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });
        $('#external-events2 .fc-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });

        $('#external-events3 .fc-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventClick: function(calEvent, jsEvent, view) {
                var $modal  = $('#editcalevent').clone(true);
                $modal.find('.editevent_title').val(calEvent.title);
                $modal.modal('show');
                //alert('Event: ' + calEvent.title);
                //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                //alert('View: ' + view.name);

                // change the border color just for fun
                //$(this).css('border-color', 'red');

            },
            drop: function(date) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                //if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                //$(this).remove();
                //}

            }
        });

    })
    window.PixelAdmin.start(init);
</script>