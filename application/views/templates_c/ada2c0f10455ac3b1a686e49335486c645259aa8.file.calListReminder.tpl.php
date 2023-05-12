<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-06 16:00:45
         compiled from "application/views/templates/calendar/calListReminder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:289477275573efea59e8845-10541945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ada2c0f10455ac3b1a686e49335486c645259aa8' => 
    array (
      0 => 'application/views/templates/calendar/calListReminder.tpl',
      1 => 1465508936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289477275573efea59e8845-10541945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573efea5ae50d6_19816081',
  'variables' => 
  array (
    'dateRequested' => 0,
    'thisSunday' => 0,
    'thisSaturday' => 0,
    'SITE_URL' => 0,
    'LASTYEAR' => 0,
    'JAN' => 0,
    'year' => 0,
    'FEB' => 0,
    'MAR' => 0,
    'APR' => 0,
    'MAY' => 0,
    'JUN' => 0,
    'JUL' => 0,
    'AUG' => 0,
    'SEP' => 0,
    'OCT' => 0,
    'NOV' => 0,
    'DEC' => 0,
    'NEXTYEAR' => 0,
    'prevSunday' => 0,
    'cellclass' => 0,
    'celldateclass' => 0,
    'thisMonday' => 0,
    'thisTuesday' => 0,
    'thisWednesday' => 0,
    'thisThursday' => 0,
    'thisFriday' => 0,
    'nextSunday' => 0,
    'thismonth' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573efea5ae50d6_19816081')) {function content_573efea5ae50d6_19816081($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->tpl_vars["today"] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dateRequested']->value,"%A %B %d,  %Y "), null, 0);?>
<?php $_smarty_tpl->tpl_vars["from"] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisSunday']->value,"%A %B %d,  %Y "), null, 0);?>
<?php $_smarty_tpl->tpl_vars["to"] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisSaturday']->value,"%A %B %d,  %Y "), null, 0);?>
<?php $_smarty_tpl->tpl_vars["cellclass"] = new Smarty_variable("cal", null, 0);?>
<?php $_smarty_tpl->tpl_vars["celldateclass"] = new Smarty_variable("caldate", null, 0);?>
<!-- monthlist -->
<H2>My Reminders</H2>
<table width="800px">
    <td class="calmenunav"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['LASTYEAR']->value;?>
" title="Previous Year"><span class=" icon fa fa-caret-left"  style="font-size:2.5EM;"> </span></a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['JAN']->value;?>
" title ="Go to January 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">JAN</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['FEB']->value;?>
" title ="Go to February 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">FEB</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['MAR']->value;?>
" title ="Go to March 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">MAR</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['APR']->value;?>
" title ="Go to Aptil 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">APR</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['MAY']->value;?>
" title ="Go to May 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">MAY</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['JUN']->value;?>
" title ="Go to June 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">JUN</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['JUL']->value;?>
" title ="Go to July 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">JUL</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['AUG']->value;?>
" title ="Go to August 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">AUG</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['SEP']->value;?>
" title ="Go to September 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">SEP</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['OCT']->value;?>
" title ="Go to October 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">OCT</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['NOV']->value;?>
" title ="Go to November 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">NOV</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['DEC']->value;?>
" title ="Go to December 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">DEC</a></td>
    <td class="calmenunav"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['NEXTYEAR']->value;?>
" title="Next Year"><span class=" icon fa fa-caret-right" style="font-size:2.5EM;"></span></a></td>
</table>

<!-- day list
<table width="800px">
       <td class="calmenunav"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['prevSunday']->value;?>
" title="Previous Week"><span class=" icon fa fa-caret-left"  style="font-size:2.5EM;"> </span></a></td>
    <td class="calmenutab">
           <table>
               <tr>

               <td class="<?php echo $_smarty_tpl->tpl_vars['cellclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisSunday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisSunday']->value;?>
">Sunday</a></td>
               </tr>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['celldateclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisSunday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisSunday']->value;?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisSunday']->value,'%B %d');?>
</a></td>
               </tr>
           </table>

       </td>
       <td class="calmenutab">
           <table>
               <tr>
               <td class="<?php echo $_smarty_tpl->tpl_vars['cellclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisMonday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisMonday']->value;?>
">Monday</a></td>
               </tr>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['celldateclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisMonday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisMonday']->value;?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisMonday']->value,'%B %d');?>
</a></td>
               </tr>
           </table>


       </td>
    <td class="calmenutab">
           <table>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['cellclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisTuesday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisTuesday']->value;?>
">Tuesday</a></td>
               </tr>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['celldateclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisTuesday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisTuesday']->value;?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisTuesday']->value,'%B %d');?>
</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td class="<?php echo $_smarty_tpl->tpl_vars['cellclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisWednesday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisWednesday']->value;?>
">Wednesday</a></td>
               </tr>
               <tr>
               <td class="<?php echo $_smarty_tpl->tpl_vars['celldateclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisWednesday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisWednesday']->value;?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisWednesday']->value,'%B %d');?>
</a></td>
               </tr>
           </table>
       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['cellclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisThursday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisThursday']->value;?>
">Thursday</a></td>
               </tr>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['celldateclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisThursday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisThursday']->value;?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisThursday']->value,'%B %d');?>
</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['cellclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisFriday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisFriday']->value;?>
">Friday</a></td>
               </tr>
               <tr>
              <td  class="<?php echo $_smarty_tpl->tpl_vars['celldateclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisFriday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisFriday']->value;?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisFriday']->value,'%B %d');?>
</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="<?php echo $_smarty_tpl->tpl_vars['cellclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisSaturday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisSaturday']->value;?>
">Saturday</a></td>
               </tr>
               <tr>
               <td class="<?php echo $_smarty_tpl->tpl_vars['celldateclass']->value;
if (intval($_smarty_tpl->tpl_vars['dateRequested']->value)===intval($_smarty_tpl->tpl_vars['thisSaturday']->value)) {?>on<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['thisSaturday']->value;?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['thisSaturday']->value,'%B %d');?>
</a></td>
               </tr>
           </table>
       </td>
       <td class="calmenunav"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/<?php echo $_smarty_tpl->tpl_vars['nextSunday']->value;?>
" title="Next Week"><span class=" icon fa fa-caret-right" style="font-size:2.5EM;"></span></a></td>

    </table>

</td>
</table>
-->

<h3><?php echo $_smarty_tpl->tpl_vars['thismonth']->value;?>
  <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</h3>

                <table >
<!--
                <thead>
                    <tr>
                        <th class="fc-widget-header">
                        date    </th>
                        <th class="fc-widget-header">
                        Client    </th>
                        <th class="fc-widget-header">
                       Reminder    </th>
                    </tr>
                </thead>
                    -->
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>

                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendatext" style="width:200px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotReminderDate'],"%A %B %d");?>
</td>
                        <td class="agendatext" style="width:200px;" ><span><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
</span></td>
                        <td class="agendatext" >&nbsp;<?php echo $_smarty_tpl->tpl_vars['d']->value['cnotNote'];?>
</td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>

<?php }} ?>
