<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-10 14:43:29
         compiled from "application/views/templates/tasks/taskList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1233445116589e25f1b92363-38777236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3731393605f0e7a324113f69d1593e998fc328d' => 
    array (
      0 => 'application/views/templates/tasks/taskList.tpl',
      1 => 1465508957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1233445116589e25f1b92363-38777236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'SITE_URL' => 0,
    'employeelist' => 0,
    'emp' => 0,
    'USER_ID' => 0,
    'id' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_589e25f1c96ee6_39440500',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589e25f1c96ee6_39440500')) {function content_589e25f1c96ee6_39440500($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>

<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });



            function CHECKIT(form)
            {
                if(!test(form)){ return;
                }

                form.submit();
            }

    function test(form)
    {

        if(form.taskDescription.value == '')
        {
            var popupmsg = 'You must enter a value for task and a date';
            $('#msg').html(popupmsg);
            $('#privatemessage').modal('show');
            window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

            alert('You must enter a value for task and a date');
            form.taskDescription.focus();
            return false;
        }

        if(form.taskDueDate.value == '')
        {
            alert('You must enter a value for task and a date');
            form.taskDueDate.focus();
            return false;
        }
        return true;

    }


<?php echo '</script'; ?>
>




<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<?php echo '<script'; ?>
>

    var name ='Tasks:<?php echo $_smarty_tpl->tpl_vars['user']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['cntLastName'];?>
';

    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        $('#jq-datatables-example_wrapper .table-caption').text(name);
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });



<?php echo '</script'; ?>
>


<div class="panel" >
<div class="panel-heading">
<h2>Task Manager</h2>

    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>

</div>
<div class="panel-body">

    <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/saveTask/"  name="dataform" id="dataform" class="panel" method="POST">
<!-- begin row -->
<div class="row">
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">Task</label>
            <textarea rows="3" id="taskDescription" name="taskDescription" class="form-control"></textarea>
        </div>
    </div>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Due Date</label>
                <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" id="taskDueDate" name="taskDueDate"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
            </div>
        </div>
    </div>
    <!-- row -->

    <?php if (!isset($_smarty_tpl->tpl_vars['USER_ROLE'])) $_smarty_tpl->tpl_vars['USER_ROLE'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['USER_ROLE']->value = 1) {?>


    <!-- begin row -->
    <div class="row">

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Assign To</label>
            <select class="input-sm  form-group-margin" name="cntid" id="cntId">
            <?php  $_smarty_tpl->tpl_vars['emp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['emp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employeelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['emp']->key => $_smarty_tpl->tpl_vars['emp']->value) {
$_smarty_tpl->tpl_vars['emp']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['emp']->value['cntId']==$_smarty_tpl->tpl_vars['USER_ID']->value) {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['emp']->value['cntId'];?>
" selected="selected" ><?php echo $_smarty_tpl->tpl_vars['emp']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['emp']->value['cntLastName'];?>
</option>
                <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['emp']->value['cntId']==$_smarty_tpl->tpl_vars['id']->value) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['emp']->value['cntId'];?>
" selected="selected" ><?php echo $_smarty_tpl->tpl_vars['emp']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['emp']->value['cntLastName'];?>
</option>

                <?php } else { ?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['emp']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['emp']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['emp']->value['cntLastName'];?>
</option>
                <?php }?>
                <?php }?>
            <?php } ?>
        </select>
            </div>
        </div>
    </div>

    <?php } else { ?>
        <input type="hidden" name="cntId" id="cntId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">

    <?php }?>

    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Task </a>
    </div>

</div>

</form>
    <div class="table-primary">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/TaskToPDF/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export PDF</a>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Date Due</th>
                    <th >Task</th>
                    <th >Created</th>
                    <th style='width:10%;'>Mark Completed</th>
                </tr>
                </thead>
                <tbody>
                <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                        <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                            <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['taskDueDate'],"%A %B %d,  %Y");?>
</span></td>

                            <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['taskDescription'];?>

                                <?php if ($_smarty_tpl->tpl_vars['d']->value['taskStatus']) {?>
                                    <br/>Response:<?php echo $_smarty_tpl->tpl_vars['d']->value['taskResponse'];?>

                                <?php }?>
                            </td>
                            <td class="text-left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['taskCreatedDateTime'],"%A %B %d,  %Y");?>

                                <br/><?php echo $_smarty_tpl->tpl_vars['d']->value['Creator'];?>

                            </td>

                            <td class="text-center">
                                <?php if (!$_smarty_tpl->tpl_vars['d']->value['taskStatus']) {?>
                                    <span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/completeTask/<?php echo $_smarty_tpl->tpl_vars['d']->value['taskID'];?>
">Complete</a>
                                    <?php } else { ?>
                                        Completed
                                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['taskCompletedDateTime'],"%B %d,  %Y at %I:%M %p");?>

                                    <?php }?>
                            </td>
                        </tr>
                    <?php } ?>

                <?php }?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
