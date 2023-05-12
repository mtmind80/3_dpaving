<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-20 10:32:21
         compiled from "application/views/templates/workorders/CloseWO.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6101602758823b95a87093-95240535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acf4f7340d6905757f0d8ce973a4c718be475007' => 
    array (
      0 => 'application/views/templates/workorders/CloseWO.tpl',
      1 => 1479246117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6101602758823b95a87093-95240535',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'userInfo' => 0,
    'proposal' => 0,
    'media' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58823b95b04699_05974020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58823b95b04699_05974020')) {function content_58823b95b04699_05974020($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {

        form.submit();
    }

    function test(form)
    {

        if(form.tinyMCETextarea.value == '')
        {
            alert('You must enter a note');
            form.jnotNote.focus();
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

        <?php $_smarty_tpl->tpl_vars["lead"] = new Smarty_variable("Notes For ", null, 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


       
           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/CloseoutWO/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">


<!-- begin row -->
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6 col-md-6">
                      <div class="form-group no-margin-hr">
                           <label class="control-label">Email Title</label>
                           <input type="text" id="cnotEmailTitle" name="cnotEmailTitle" class="form-control">
                      </div>
                   	 </div>
                   <div class="col-sm-12">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Email Body</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                        
                  <div class="col-sm-3">
                          <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_EMAIL'];?>
" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
" class="checkbox-inline">
                  </div>
               </div>
               
               <div class="row">
               	<div class="col-sm-12">
                <h3>Select Which Images You Would Like To Attach To The Email</h3>
                <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['media']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
                	<div class="col-sm-3" style="min-height: 300px; max-height:275px;">
                        <label class="control-label">Include File In Email</label>
                        <input type="checkbox" class="form-check" name="cnotSelectedImage[]" value="<?php echo $_smarty_tpl->tpl_vars['image']->value['imageName'];?>
">
                         <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['imagePath'];?>
" style="max-width:100%; max-height:250px">
                    </div>
                <?php } ?>
                </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-danger btn-labeled">Close Project</a>
                   </div>

               </div>
           </form>


   </div>
 </div>


<?php }} ?>
