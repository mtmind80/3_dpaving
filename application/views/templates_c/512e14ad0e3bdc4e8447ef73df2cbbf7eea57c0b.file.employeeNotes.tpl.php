<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-13 03:57:27
         compiled from "application/views/templates/crm/employeeNotes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14749104665827e4a7d427f5-11576108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '512e14ad0e3bdc4e8447ef73df2cbbf7eea57c0b' => 
    array (
      0 => 'application/views/templates/crm/employeeNotes.tpl',
      1 => 1465508945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14749104665827e4a7d427f5-11576108',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'SITE_URL' => 0,
    'edit' => 0,
    'id' => 0,
    'note_id' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5827e4a7da5bc5_93361335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5827e4a7da5bc5_93361335')) {function content_5827e4a7da5bc5_93361335($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
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

        if(form.cnotNote.value == '')
        {
            alert('You must enter a note');
            form.cnotNote.focus();
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



<?php echo '</script'; ?>
>


<div class="panel" >
<div class="panel-heading">

    <h2>Employee Notes for <?php echo $_smarty_tpl->tpl_vars['user']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['cntLastName'];?>
</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>

</div>
<div class="panel-body">
    <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveEmployeeNote/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['note_id']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">

        <input type="hidden" name="cntId" id="cntId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
        <input type="hidden" name="cnotId" id="cnotId" value="<?php echo $_smarty_tpl->tpl_vars['note_id']->value;?>
">
     <!-- begin row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
            <label class="control-label">Note</label>
            <textarea rows="3" id="cnotNote" name="cnotNote" class="form-control"><?php echo $_smarty_tpl->tpl_vars['edit']->value['cnotNote'];?>
</textarea>
            </div>
            </div>
        </div>
    <!-- row -->

    <!-- begin row -->
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
            <label class="control-label">Set Reminder</label>
            <input type="checkbox"  id="cnotReminder" name="cnotReminder" value="1" class="checkbox-inline"  <?php if ($_smarty_tpl->tpl_vars['edit']->value['cnotReminder']) {?> checked <?php }?>>
            </div>
        </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Reminder Date</label>
            <div class="input-group date" id="bs-datepicker-component">
                <input type="text" id="cnotReminderDate" name="cnotReminderDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['edit']->value['cnotReminderDate'],"%m/%d/%Y");?>
"
                class="form-control">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
    </div>

    </div>
    <!-- row -->

    <!-- buton row -->
    <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Note</a>
        </div>
        <div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
    </div>
    </form>

    <?php } else { ?>
<form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveEmployeeNote/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">

<input type="hidden" name="cntId" id="cntId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
<!-- begin row -->
<div class="row">
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">Note</label>
            <textarea rows="3" id="cnotNote" name="cnotNote" class="form-control"></textarea>
        </div>
    </div>
</div>
<!-- row -->

    <!-- begin row -->
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Set Reminder</label>
                <input type="checkbox"  id="cnotReminder" name="cnotReminder" value="1" class="checkbox-inline">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Reminder Date</label>
                <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" id="cnotReminderDate" name="cnotReminderDate"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
            </div>
        </div>
    </div>
    <!-- row -->

    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Note</a>
    </div>
    <div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
    </div>
</div>
</form>

<?php }?>
    <div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Date Created</th>
                    <th >Note</th>
                    <th >Created By</th>
                    <th style='width:10%;'>Edit</th>
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
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cnotNote']) {?>
                <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                    <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotCreatedDate'],"%B %d,  %Y");?>
</span></td>
                    <!--
                    cnotReminderDate
                    <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotReminderDate'],"%B %d,  %Y");?>
</span></td>
                    <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotCreatedDate'],"%A %B %d,  %Y at %I:%M %p");?>
</span></td>
                    -->

                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['cnotNote'];?>

                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cnotReminder']) {?><br/><span class="alert-info"> REMINDER SET<br/><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotReminderDate'],"%B %d,  %Y");?>
</span><?php }?></td>
                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['Creator'];?>
</td>
                    <td class="text-left"><span class="btn-label icon fa fa-angle-right"></span>&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['cnotId'];?>
">Edit</a></td>
                </tr>
                <?php }?>
            <?php } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
