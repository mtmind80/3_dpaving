<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-20 13:02:05
         compiled from "application/views/templates/workorders/woPermits.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180246365958825eadd1e0d4-27835022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a0b0606c2358aa27c899768fa44138714c97b19' => 
    array (
      0 => 'application/views/templates/workorders/woPermits.tpl',
      1 => 1465508960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180246365958825eadd1e0d4-27835022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'USER_ROLE' => 0,
    'edit' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'services' => 0,
    's' => 0,
    'wtype' => 0,
    'w' => 0,
    'wstatus' => 0,
    'permitslist' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58825eade476b9_93519177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58825eade476b9_93519177')) {function content_58825eade476b9_93519177($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
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

        if(form.wopNumber.value == '')
        {
            alert('You must enter a permit number');
            form.wopNumber.focus();
            return false;
        }

        if(form.wopfee1.value != parseFloat(form.wopfee1.value))
        {
            alert('You must enter a valid number for fee');
            form.wopfee1.value = 0;
            form.wopfee1.focus();
            return false;
        }
        if(form.wopfee2.value != parseFloat(form.wopfee2.value))
        {
            alert('You must enter a valid number for fee');
            form.wopfee2.value = 0;
            form.wopfee2.focus();
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
<div class="panel">


    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="panel-body">


    <?php $_smarty_tpl->tpl_vars["lead"] = new Smarty_variable("Permits For ", null, 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
       <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWOPermit/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="wopID" id="wopID" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopID'];?>
">

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-8">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Edit Permit for Service</label>
                           <select id="wopjordID" name="wopjordID" class="form-control" >
                               <option value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopjordID'];?>
"><?php echo $_smarty_tpl->tpl_vars['edit']->value['jordName'];?>
</option>
                               <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['jordID'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['jordName'];?>
</option>
                               <?php } ?>
                               </select>
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Number</label>
                           <input type="text" id="wopNumber" name="wopNumber" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopNumber'];?>
">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit County</label>
                           <input type="text" id="wopCounty" name="wopCounty" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopCounty'];?>
">
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Submit Fee</label>
                           <input type="text" id="wopfee1" name="wopfee1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopfee1'];?>
">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Additional Fee</label>
                           <input type="text" id="wopfee2" name="wopfee2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopfee2'];?>
">
                       </div>
                   </div>

               </div>

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Type</label>
                           <select id="wopType" name="wopType" >
                               <option value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopType'];?>
"><?php echo $_smarty_tpl->tpl_vars['edit']->value['wopType'];?>
</option>
                               <?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wtype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['w']->value['wopType'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['wopType'];?>
</option>
                               <?php } ?>
                               </select>
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Status</label>
                           <select id="wopStatus" name="wopStatus" >
                               <option value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['wopStatus'];?>
"><?php echo $_smarty_tpl->tpl_vars['edit']->value['wopStatus'];?>
</option>
                               <?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wstatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['w']->value['wopStatus'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['wopStatus'];?>
</option>
                              <?php } ?>
                           </select>
                       </div>
                   </div>

               </div>
               <!-- row -->


               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Note</label>
                           <textarea rows="3" id="wopNote" name="wopNote" class="form-control"><?php echo $_smarty_tpl->tpl_vars['edit']->value['wopNote'];?>
</textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->

       <?php } else { ?>
           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWOPermit/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-8">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Create New Permit For Service</label>
                           <select id="wopjordID" name="wopjordID" class="form-control" >
                               <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['jordID'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['jordName'];?>
</option>

                               <?php } ?>

                           </select>
                       </div>
                   </div>

               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Number</label>
                           <input type="text" id="wopNumber" name="wopNumber" class="form-control">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit County</label>
                           <input type="text" id="wopCounty" name="wopCounty" class="form-control">
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Submit Fee</label>
                           <input type="text" id="wopfee1" name="wopfee1" class="form-control">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Additional Fee</label>
                           <input type="text" id="wopfee2" name="wopfee2" class="form-control">
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Type</label>
                           <select id="wopType" name="wopType" >
                               <?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wtype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['w']->value['wopType'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['wopType'];?>
</option>
                               <?php } ?>
                           </select>
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Status</label>
                           <select id="wopStatus" name="wopStatus" >
                               <?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wstatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['w']->value['wopStatus'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['wopStatus'];?>
</option>
                               <?php } ?>
                           </select>
                       </div>
                   </div>

               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Note</label>
                           <textarea rows="3" id="wopNote" name="wopNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->


       <?php }?>
               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
                   </div>

               </div>
           </form>

       <!-- /11. $JQUERY_DATA_TABLES -->
       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >Permit</th>
                   <th >Status</th>
                   <th >Note</th>
                   <th style='width:10%;'>Log</th>
                   <th style='width:10%;'>Edit</th>
                   <th style='width:10%;'>Delete</th>
               </tr>
               </thead>
               <tbody>
               <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
               <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
               <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permitslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                       <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                           <td class="text-justify">Permit number: <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPermits/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['wopID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['wopNumber'];?>
</span></a>
                           <br/><?php echo $_smarty_tpl->tpl_vars['d']->value['jordName'];?>

                           </td>

                           <td>
                               <?php if ($_smarty_tpl->tpl_vars['d']->value['wopStatus']=='Completed') {?>
                               <span class="alert-success">STATUS:<?php echo $_smarty_tpl->tpl_vars['d']->value['wopStatus'];?>
</span>
                               <?php } else { ?>
                                   <span class="alert-danger">STATUS:<?php echo $_smarty_tpl->tpl_vars['d']->value['wopStatus'];?>
</span>
                               <?php }?>
                               <br />
                               COUNTY:<?php echo $_smarty_tpl->tpl_vars['d']->value['wopCounty'];?>

                              <br />
                              <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['wopCreatedDate'],"%A %B %d,  %Y at %I:%M %p");?>

                               <br />Hours Spent:
                               <?php if ($_smarty_tpl->tpl_vars['d']->value['loghours']) {?>
                                <?php echo $_smarty_tpl->tpl_vars['d']->value['loghours'];?>

                               <?php } else { ?>
                               0
                               <?php }?>
                           </td>
                           <td ><?php echo $_smarty_tpl->tpl_vars['d']->value['wopNote'];?>
</td>
                           <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPermitLog/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['wopID'];?>
">Log</a></td>
                           <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPermits/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['wopID'];?>
">Edit</a></td>
                           <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/removePermit/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['wopID'];?>
','You are about to delete this permit and all records associated with it.\nAre you sure?');">Delete</a></td>
                       </tr>

               <?php } ?>



               </tbody>
           </table>
       </div>
       <!-- /11. $JQUERY_DATA_TABLES -->
               <?php }?>

   </div>
</div>

<?php }} ?>
