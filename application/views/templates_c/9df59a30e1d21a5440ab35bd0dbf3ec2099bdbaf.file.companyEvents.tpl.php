<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-08 22:46:07
         compiled from "application/views/templates/calendar/companyEvents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127217938657d1ea2fa4ece9-79283394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9df59a30e1d21a5440ab35bd0dbf3ec2099bdbaf' => 
    array (
      0 => 'application/views/templates/calendar/companyEvents.tpl',
      1 => 1465508937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127217938657d1ea2fa4ece9-79283394',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit' => 0,
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57d1ea2faf0477_34845274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57d1ea2faf0477_34845274')) {function content_57d1ea2faf0477_34845274($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();
        $('#eventTime').timepicker();


    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.eventDescription.value == '')
        {
            alert('You must enter a description');
            form.eventDescription.focus();
            return false;
        }

        if(form.eventName.value == '')
        {
            alert('You must enter a name');
            form.eventName.focus();
            return false;
        }

        if(form.eventDate.value == '')
        {
            alert('You must enter a date');
            form.eventDate.focus();
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

        <h2>Company Events</h2>


        <a class="topbut btn btn-success" href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-save"></span> Save Event</a>

    </div>
    <div class="panel-body">
        <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/saveEvent/<?php echo $_smarty_tpl->tpl_vars['edit']->value['eventID'];?>
"  name="userform" id="dataform" class="panel" method="POST">

                <input type="hidden" name="edit" id="edit" value="1">
                <input type="hidden" name="eventID" id="eventID" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['eventID'];?>
">
                <!-- begin row -->

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Name</label>
                            <input type="text" id="eventName" name="eventName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['eventName'];?>
">

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Date</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="eventDate" name="eventDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['edit']->value['eventDate'],"%m/%d/%Y");?>
"
                                       class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Time</label>
                            <input type="text" id="eventTime" name="eventTime" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['eventTime'];?>
">

                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Description</label>
                            <textarea rows="3" id="eventDescription" name="eventDescription" class="form-control"><?php echo $_smarty_tpl->tpl_vars['edit']->value['eventDescription'];?>
</textarea>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <!-- buton row -->
                <div class="row">
                    <div class="col-sm-2">
                        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Event</a>
                    </div>
                </div>
            </form>

        <?php } else { ?>
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/saveEvent/"  name="userform" id="dataform" class="panel" method="POST">


                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Name</label>
                            <input type="text" id="eventName" name="eventName" class="form-control" >

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Date</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="eventDate" name="eventDate"
                                       class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Time</label>
                            <input type="text" id="eventTime" name="eventTime" class="form-control" >

                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Description</label>
                            <textarea rows="3" id="eventDescription" name="eventDescription" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <!-- buton row -->
                <div class="row">
                    <div class="col-sm-2">
                        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Event</a>
                    </div>
                </div>

            </form>

        <?php }?>
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Date</th>
                    <th >Event</th>
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
                    <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                        <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['eventDate'],"%A %B %d,  %Y ");?>
 at <?php echo $_smarty_tpl->tpl_vars['d']->value['eventTime'];?>
</span></td>
                        <td class="text-left"><b><?php echo $_smarty_tpl->tpl_vars['d']->value['eventName'];?>
</b>
                            <br/><?php echo $_smarty_tpl->tpl_vars['d']->value['eventDescription'];?>

                        </td>
                        <td class="text-left"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/editcalendarCE/<?php echo $_smarty_tpl->tpl_vars['d']->value['eventID'];?>
">Edit</a></td>
                    </tr>
                <?php } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
