<!--calendar widget -->
<script type="text/javascript">
    $(function(){
        // init datepicker on calendarwidget

        $('#calendar-div').datepicker();
        // bind a handler to onchange event:
        $('#calendar-div').datepicker().on('changeDate', function (ev) {
              var day = ev.date.getDate(),
                    month = ev.date.getMonth() + 1,
                    year = ev.date.getFullYear(),
                    selectedDate = month + '/' + day + '/' + year;  // date as: m/d/Y

            // do something here:
            var clickedOnDate = selectedDate;
            {literal}
            if(month <= 9){month ='0' + month;}
            if(day<= 9){day ='0' + day;}
            var datestr = year + '.' + month + '.' + day;//'2012.08.10';
            var timestamp = (new Date(datestr.split(".").join("-")).getTime())/1000;

            window.location.href= site_url + 'calendar/showcalendarWO/' + timestamp;

            {/literal}

        });
    });
</script>
<div id="calwrap">
    <div class="widget-block  white-box calendar-box">
        <div id="calendar-div" class="col-md-7 blue-box calendar no-padding" ></div>

        <div class="col-md-5">
            <div class="padding" style='width:50px;'>
                <h3 class="text-center">{$todayname}</h3>
                <h2 class="today">{$todayday}</h2>
            </div>
        </div>
    </div>
</div>
<!--calendar widget ends here -->