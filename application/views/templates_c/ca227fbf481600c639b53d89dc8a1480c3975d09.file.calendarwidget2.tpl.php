<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 12:00:18
         compiled from "application/views/templates/common/calendarwidget2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14816341445928687cdd90e7-81112536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca227fbf481600c639b53d89dc8a1480c3975d09' => 
    array (
      0 => 'application/views/templates/common/calendarwidget2.tpl',
      1 => 1497340934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14816341445928687cdd90e7-81112536',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5928687cdf5b77_09247162',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928687cdf5b77_09247162')) {function content_5928687cdf5b77_09247162($_smarty_tpl) {?><!--calendar widget -->
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        // init datepicker on calendarwidget

        $('#calendar-div').datepicker();
        // bind a handler to onchange event:
        $('#calendar-div').datepicker().on('changeDate', function (ev) {
              var day = ev.date.getDate()+1,
                    month = ev.date.getMonth() + 1,
                    year = ev.date.getFullYear(),
                    selectedDate = month + '/' + day + '/' + year;  // date as: m/d/Y

            // do something here:
            var clickedOnDate = selectedDate;
            
            if(month <= 9){month ='0' + month;}
            if(day<= 9){day ='0' + day;}
            var datestr = year + '.' + month + '.' + day;//'2012.08.10';
           var timestamp = (new Date(datestr.split(".").join("-")).getTime())/1000;

           window.location.href= site_url + 'calendar/showcalendarWO/' + timestamp;

            


        });
    });
<?php echo '</script'; ?>
>

<div id="calwrap">
    <div class="widget-block  white-box calendar-box">
        <div id="calendar-div" class="col-md-12 blue-box calendar no-padding" style="height:200px;"></div>

    </div>
</div>
<!--calendar widget ends here --><?php }} ?>
