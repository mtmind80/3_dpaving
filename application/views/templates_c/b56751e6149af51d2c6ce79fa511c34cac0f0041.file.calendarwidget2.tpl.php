<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 14:32:16
         compiled from "application/views/templates/common/calendarwidget2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:620072246573c908936d530-95219132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b56751e6149af51d2c6ce79fa511c34cac0f0041' => 
    array (
      0 => 'application/views/templates/common/calendarwidget2.tpl',
      1 => 1465508938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '620072246573c908936d530-95219132',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c90893713b5_62753543',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c90893713b5_62753543')) {function content_573c90893713b5_62753543($_smarty_tpl) {?><!--calendar widget -->
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
