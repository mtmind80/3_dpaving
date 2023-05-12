<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-27 08:57:50
         compiled from "application/views/templates/workorders/woManagers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1077804468588b5fee50c2e8-80084145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c0458ca5578a0e983824c3a1f74654e64440bb' => 
    array (
      0 => 'application/views/templates/workorders/woManagers.tpl',
      1 => 1479406112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1077804468588b5fee50c2e8-80084145',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'proposalDetails' => 0,
    'proposal' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'managers' => 0,
    'e' => 0,
    'employees' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_588b5fee595da0_24521982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588b5fee595da0_24521982')) {function content_588b5fee595da0_24521982($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


<?php echo '</script'; ?>
>


<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<?php echo '<script'; ?>
 type="text/javascript">

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


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.jobAddress1.value == '')
        {
            alert('You must enter a value for address');
            form.jobAddress1.focus();
            return false;
        }

        return true;

    }

<?php echo '</script'; ?>
>

<div class="panel">

    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="panel-body">

        <div id="Proposalheader">
            <h3>ASSIGN JOB MANAGERS: <?php echo $_smarty_tpl->tpl_vars['proposalDetails']->value['jordName'];?>
 </h3>
        </div>


        <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==5) {?>
        

            <!-- row mark as sent nto -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWOJobManagers/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="cdataform" id="cdataform" class="panel" method="POST">

                <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
                <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">

                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Job Managers</label>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-4" >
                        <label class="control-label">Primary Manager</label>
                        <br />Currently Assigned to : <?php echo $_smarty_tpl->tpl_vars['proposalDetails']->value['manager1firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposalDetails']->value['manager1lastname'];?>


                        </div>
                    <div class="col-sm-4" >
                        <select name ="jordJobManagerID" id="jordJobManagerID" class="form-control">
                            <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['e']->value['cntLastName'];?>
</option>
                            <?php } ?>
                        </select>

                        </div>
                </div>

                <div class="row" >
                    <div class="col-sm-4" >
                        <label class="control-label">Job Manager</label>
                        <br />
                        Currently Assigned to : <?php echo $_smarty_tpl->tpl_vars['proposalDetails']->value['manager2firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposalDetails']->value['manager2lastname'];?>

                    </div>
                    <div class="col-sm-4" >

                    <select name ="jordJobManagerID2" id="jordJobManagerID2" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['e']->value['cntLastName'];?>
</option>
                        <?php } ?>
                        <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['e']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['e']->value['cntLastName'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
                </div>


                <!-- buton row -->
                <div class="row">
                    <div class="col-sm-2">
                        <a href="Javascript:this.cdataform.submit();" class="btn btn-primary btn-labeled">Update Managers</a>
                    </div>

                </div>
            </form>

        <?php }?>

    </div>
</div>

<?php }} ?>
