<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-19 12:10:58
         compiled from "application/views/templates/workorders/woPermitLogList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16038020795745c6605e49e7-25826216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf8a125a8cf979c02b2a514445a2304d30859a9a' => 
    array (
      0 => 'application/views/templates/workorders/woPermitLogList.tpl',
      1 => 1465508959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16038020795745c6605e49e7-25826216',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5745c66062c130_96906951',
  'variables' => 
  array (
    'PermitLog' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'wopID' => 0,
    'CurrentDate' => 0,
    'PermitInfo' => 0,
    'v' => 0,
    'odd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5745c66062c130_96906951')) {function content_5745c66062c130_96906951($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
?>
<?php if ($_smarty_tpl->tpl_vars['PermitLog']->value) {?>
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

    <!-- / Javascript -->
    <!-- /11. $JQUERY_DATA_TABLES -->
<?php }?>

<?php echo '<script'; ?>
>
    init.push(function () {


        $('#bs-datepicker-component').datepicker();

        $('#logform').hide();



        $( "#openlogform" ).click(function() {
            $('#logform').show();
        });


        $( "#closelogform" ).click(function() {
            $('#logform').hide();
        });
    });

    function hideform()
    {
        $('#logform').hide();
    }

    function showform()
    {
        $('#logform').show();
    }



<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(!isAlphaNumericAndSpace(form.plogNote.value))
        {
            alert('You must enter a note.');
            form.plogNote.focus();
            return false;
        }

        if(!isFloat(form.plogHours.value))
        {
            alert('Amount must be a valid number or zero..');
            form.plogHours.value = 0;
            form.plogHours.focus();
            return false;

        }
        return true;

    }

<?php echo '</script'; ?>
>




<div class="panel" id='logform'>
    <div class="panel-heading">

        <h2>Add Permit Log</h2>
        <a class="topbut btn btn-success" href="Javascript:hideform();"><span class="btn-label icon fa fa-arrow-circle-down"></span> Hide Log Form</a>

    </div>
    <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/savePermitLog/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['wopID']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <INPUT TYPE="HIDDEN" id="plogwopID" name="plogwopID" value="<?php echo $_smarty_tpl->tpl_vars['wopID']->value;?>
">
            <!-- begin row -->
            <div class="row">
                <!-- col-sm-6 -->
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Note</label>
                        <textarea class="form-control" rows="2" cols='65' name="plogNote" id ="plogNote"></textarea>
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- begin row -->
            <div class="row">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Log Date</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="plogDate" name="plogDate"
                                       class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Hours</label>
                            <input type="text" name="plogHours" id="plogHours" class="form-control">
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
            </div>
            <!-- row -->

            <!-- buton row -->
            <div class="row">
                <div class="col-sm-2">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Log</a>
                </div>

            </div>
        </form>
    </div>
</div>


<div class="panel" >
    <div class="panel-heading">

        <h2><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPermits/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" title="Back to Permit List"><span class="btn-label icon fa fa-arrow-left"></span>Permits</a> <?php echo $_smarty_tpl->tpl_vars['PermitInfo']->value['wopNumber'];?>
 <?php echo $_smarty_tpl->tpl_vars['PermitInfo']->value['wopCounty'];?>
</h2>
        <?php echo $_smarty_tpl->tpl_vars['PermitInfo']->value['jordName'];?>

        <a class="topbut btn btn-success" href="Javascript:showform();"><span class="btn-label icon fa fa-angle-double-up"></span> Add Permit Log</a>
    </div>
<div class="panel-body">
<div class="table-primary">
    <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
        <thead>
        <tr>
            <th >Note</th>
            <th >Date</th>
            <th >Hours</th>
            <th style='width:10%;'>Remove</th>
        </tr>
        </thead>
        <tbody>
<?php if ($_smarty_tpl->tpl_vars['PermitLog']->value) {?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PermitLog']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
" id='t<?php echo $_smarty_tpl->tpl_vars['v']->value['plogID'];?>
'>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['v']->value['plogNote'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['v']->value['plogDate'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['v']->value['plogHours'];?>
</td>
                    <td class="text-center"><a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/removePermitLog/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['wopID']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['plogID'];?>
','You are about to delete this log entry permanently! Are you sure?');">Remove</a></td>
                </tr>
            <?php } ?>



<?php } else { ?>
            <tr class="<?php echo $_smarty_tpl->tpl_vars['odd']->value;?>
" >
                <td colspan='5'><span class="note-title">No Logs Found</span></td>
            </tr>

<?php }?>
        </tbody>
    </table>

</div>
    </div>
</div><?php }} ?>
