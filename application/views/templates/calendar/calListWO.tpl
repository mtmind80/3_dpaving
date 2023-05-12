
<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '{$startdate}',
            editable: true,
            eventLimit: true, // allow "more" link when too many events

            events: {
                url: site_url + 'calendar/showcalendarWOdata/',
                error: function() {
                    $('#script-warning').html(site_url + 'calendar/showcalendarWOdata/');
                    $('#script-warning').show();
                }
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            }
        });


    });

</script>

<style>

    body {
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #script-warning {
        display: none;
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: red;
    }

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 10px;
    }

</style>


<div id='script-warning'>
    <code>cant find input file</code>.
</div>

<div id='loading'>loading...</div>

<div class="row">
    <div class="col-sm-12">

        <div class="panel">
            <div class="panel-heading">
                <h2>Scheduled Jobs</h2>

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

