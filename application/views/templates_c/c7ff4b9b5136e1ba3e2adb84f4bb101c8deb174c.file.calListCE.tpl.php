<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-02 07:35:11
         compiled from "application/views/templates/calendar/calListCE.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3252649355893358f6c6845-62148098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7ff4b9b5136e1ba3e2adb84f4bb101c8deb174c' => 
    array (
      0 => 'application/views/templates/calendar/calListCE.tpl',
      1 => 1474261527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3252649355893358f6c6845-62148098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'monthName' => 0,
    'year' => 0,
    'USER_ROLE' => 0,
    'SITE_URL' => 0,
    'month' => 0,
    'JAN' => 0,
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
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5893358f767ba5_10756141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5893358f767ba5_10756141')) {function content_5893358f767ba5_10756141($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<!-- monthlist -->
<h2>Company Events <?php echo $_smarty_tpl->tpl_vars['monthName']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</h2>

<?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1) {?>
<a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/editcalendarCE/"><span class="btn-label icon fa fa-clock-o"></span> Add Event</a>
    <p>&nbsp;</p>

<?php }?>
<table width="100%">
    <td class="calmenunav"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['year']->value-1;?>
/<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
" title="Previous Year"><span class=" icon fa fa-caret-left"  style="font-size:2.5EM;"> </span></a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['JAN']->value;?>
" title ="Go to January, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">JAN</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['FEB']->value;?>
" title ="Go to February, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">FEB</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['MAR']->value;?>
" title ="Go to March, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">MAR</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['APR']->value;?>
" title ="Go to Aptil, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">APR</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['MAY']->value;?>
" title ="Go to May, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">MAY</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['JUN']->value;?>
" title ="Go to June, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">JUN</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['JUL']->value;?>
" title ="Go to July, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">JUL</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['AUG']->value;?>
" title ="Go to August, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">AUG</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['SEP']->value;?>
" title ="Go to September, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">SEP</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['OCT']->value;?>
" title ="Go to October, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">OCT</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['NOV']->value;?>
" title ="Go to November, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">NOV</a></td>
    <td class="monthlist"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['DEC']->value;?>
" title ="Go to December 1, <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
">DEC</a></td>
    <td class="calmenunav"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/<?php echo $_smarty_tpl->tpl_vars['year']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
" title="Next Year"><span class=" icon fa fa-caret-right"  style="font-size:2.5EM;"> </span></a></td>
</table>




                <table >
 <!--
                <thead>
                    <tr>
                        <th class="fc-widget-header">
                        all day    </th>
                        <th class="fc-widget-header">
                        agenda    </th>
                    </tr>
                </thead>

                event sof this month
                -->
                    <tbody>
                    <?php $_smarty_tpl->tpl_vars["to"] = new Smarty_variable('', null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                        <tr  style="border: 1px solid #d9edf7;">
                            <td class="agendatext2" ><h3><?php echo $_smarty_tpl->tpl_vars['d']->value['eventName'];?>
</h3><?php echo $_smarty_tpl->tpl_vars['d']->value['eventDescription'];?>
<br/>
                                <span class=" fa fa-clock-o"></span> &nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['eventDate'],"%A %B %d,  %Y ");?>
 at <?php echo $_smarty_tpl->tpl_vars['d']->value['eventTime'];?>
</td>
                        </tr>


                    <?php } ?>

                    </tbody>
                </table>

<?php }} ?>
