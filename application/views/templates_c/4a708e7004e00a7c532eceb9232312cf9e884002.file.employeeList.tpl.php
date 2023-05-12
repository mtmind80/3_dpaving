<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-08-27 20:44:36
         compiled from "application/views/templates/crm/employeeList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9710199626014c9e3369931-33943370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a708e7004e00a7c532eceb9232312cf9e884002' => 
    array (
      0 => 'application/views/templates/crm/employeeList.tpl',
      1 => 1630097072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9710199626014c9e3369931-33943370',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6014c9e35fcf31_82704000',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
    'system_roles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6014c9e35fcf31_82704000')) {function content_6014c9e35fcf31_82704000($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
?>
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<?php echo '<script'; ?>
>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });



    function ShowTasks(username, id)
    {
        alert('We are here');
//       Swoop('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/openTaskForm/'+ id,'400','400');

    }

<?php echo '</script'; ?>
>


<div class="panel" >
<div class="panel-heading">

    <h2>Employees</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/CreateEmployee/"><span class="btn-label icon fa fa-male"></span> Add Employee</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Phone</th>


                    <th >Picture</th>
                    <th style='width:10%;'>Tools</th>
                </tr>
                </thead>
                <tbody>
                <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntStatusId']==0) {?>
                        <tr class="alert-danger">
                    <?php } else { ?>

                        <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">

                    <?php }?>
                    <td><span class="note-title"><a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editEmployee/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
' ><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
</a></span><br />Title:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntJobTitle'];?>
<br />Role:
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntRole']==1) {?>
                        <span class="alert-danger"><?php echo $_smarty_tpl->tpl_vars['system_roles']->value[$_smarty_tpl->tpl_vars['d']->value['cntRole']-1];?>
</span>
                    <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['system_roles']->value[$_smarty_tpl->tpl_vars['d']->value['cntRole']-1];?>

                    <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntStatusId']==0) {?>
                    <br /><span class="alert-danger">DISABLED</span>
                        <?php }?>
                    </td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryPhone'];?>
</td>

                    <!--<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntHireDate'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['note_count'];?>
</td> -->

                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntAvatar']&&$_smarty_tpl->tpl_vars['d']->value['cntAvatar']!='NULL') {?>
                        <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/crm/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntAvatar'];?>
" target='image'><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/crm/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntAvatar'];?>
" border="0" alt="User Avatar" width='60' /></a></td>
                    <?php } else { ?>
                        <td class="text-center"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/pixel-admin/avatar.png" border="0" alt="No Avatar" width='60' /> </td>
                    <?php }?>
                    <td class="text-center">
                        <a href="Javascript:ShowTools('<?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
','<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
','crm/showEmpTools');" title="Show Tools"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/images/tools2.gif" border="0" alt="Tools" width="26" height="26" VALIGN='top'></a>
  <!--
                        <span class="btn-label icon fa fa-angle-right"></span>&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editEmployee/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Edit</a>
                    <br/>
                        <span class="btn-label icon fa fa-angle-right"></span>&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeNotes/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Notes</a>
-->
                    </td>
                </tr>
            <?php } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
