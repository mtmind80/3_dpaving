<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-18 18:53:15
         compiled from "application/views/templates/common/calendarwidget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151297125258800dfbde0bf5-58017642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b58bfada2d8a22bed5dcf42f42a777db6e031789' => 
    array (
      0 => 'application/views/templates/common/calendarwidget.tpl',
      1 => 1465508938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151297125258800dfbde0bf5-58017642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'todayname' => 0,
    'todayday' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58800dfbde76f2_09215123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58800dfbde76f2_09215123')) {function content_58800dfbde76f2_09215123($_smarty_tpl) {?><!--calendar widget -->
<?php echo '<script'; ?>
 type="text/javascript">
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
        <div id="calendar-div" class="col-md-7 blue-box calendar no-padding" ></div>

        <div class="col-md-5">
            <div class="padding" style='width:50px;'>
                <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['todayname']->value;?>
</h3>
                <h2 class="today"><?php echo $_smarty_tpl->tpl_vars['todayday']->value;?>
</h2>
            </div>
        </div>
    </div>
</div>
<!--calendar widget ends here --><?php }} ?>
