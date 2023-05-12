<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-26 23:21:27
         compiled from "application/views/templates/common/calendarwidget2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9065641826010a3f70595b2-33277439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94a4a90f1e73b963480fee917406cd8c5359b437' => 
    array (
      0 => 'application/views/templates/common/calendarwidget2.tpl',
      1 => 1497340934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9065641826010a3f70595b2-33277439',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6010a3f705cb41_65086725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6010a3f705cb41_65086725')) {function content_6010a3f705cb41_65086725($_smarty_tpl) {?><!--calendar widget -->
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
