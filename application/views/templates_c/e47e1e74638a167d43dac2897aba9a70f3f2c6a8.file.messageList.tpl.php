<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-07-02 09:52:19
         compiled from "application/views/templates/messages/messageList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16617899475931ad33962d55-14976311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e47e1e74638a167d43dac2897aba9a70f3f2c6a8' => 
    array (
      0 => 'application/views/templates/messages/messageList.tpl',
      1 => 1497340981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16617899475931ad33962d55-14976311',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5931ad339f1838_89248674',
  'variables' => 
  array (
    'USER_FULLNAME' => 0,
    'SITE_URL' => 0,
    'employeelist' => 0,
    'emp' => 0,
    'USER_ID' => 0,
    'filter' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5931ad339f1838_89248674')) {function content_5931ad339f1838_89248674($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<?php echo '<script'; ?>
 type="text/javascript">

function SendMe(usrid)
{

}

            function CHECKIT(form)
            {
                if(!test(form)){ return;
                }

                form.submit();
            }

    function test(form)
    {

        if(form.msgMessage.value == '')
        {
            showMessages('You must enter a message');
            //alert('You must enter a message');
            form.msgMessage.focus();
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

    var name ='Messages:<?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
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
        <h2><?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
</h2>
    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>

</div>
<div class="panel-body">
<form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
messages/addMessage/"  name="dataform" id="dataform" class="panel" method="POST">
<!-- begin row -->
<div class="row">
    <div class="col-sm-8">
        <div class="form-group no-margin-hr">
            <label class="control-label">Message</label>
            <textarea rows="3" cols="66" id="msgMessage" name="msgMessage" class="form-control-lg"></textarea>
        </div>
    </div>


    <div class="col-sm-2">
        <div class="form-group no-margin-hr">
            <label class="control-label">Send To</label>
            <select class="input-sm  form-group-margin" name="msgSenderID" id="msgSenderID">
                <?php  $_smarty_tpl->tpl_vars['emp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['emp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employeelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['emp']->key => $_smarty_tpl->tpl_vars['emp']->value) {
$_smarty_tpl->tpl_vars['emp']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['emp']->value['cntId']==$_smarty_tpl->tpl_vars['USER_ID']->value) {?>
                            <!-- <option value="<?php echo $_smarty_tpl->tpl_vars['emp']->value['cntId'];?>
" selected="selected" ><?php echo $_smarty_tpl->tpl_vars['emp']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['emp']->value['cntLastName'];?>
</option>
                   -->
                        <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['emp']->value['cntId'];?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value==$_smarty_tpl->tpl_vars['emp']->value['cntId']) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['emp']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['emp']->value['cntLastName'];?>
</option>
                        <?php }?>
                <?php } ?>
            </select>
        </div>
    </div>

    </div>
    <!-- row -->




    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Send</a>
    </div>

</div>
</form>
    <div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Sender</th>
                    <th >Message</th>
                    <th >Date</th>
                    <th >Time</th>
                    <th style='width:10%;'>Hide</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                    <tr>
                        <td class="text-left"><?php if (intval($_smarty_tpl->tpl_vars['USER_ID']->value)==intval($_smarty_tpl->tpl_vars['d']->value['msgSenderID'])) {
echo $_smarty_tpl->tpl_vars['d']->value['Sender'];
} else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
messages/myMessages/<?php echo $_smarty_tpl->tpl_vars['d']->value['msgSenderID'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['Sender'];?>
</a><?php }?></td>
                        <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['msgMessage'];?>
</td>
                        <td class="text-left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['msgSentDate'],"%A %B %d,  %Y");?>
 </td>
                        <td class="text-left"> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['msgSentDate']," %I:%M %p");?>
</td>
                        <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
messages/hideMessage/<?php echo $_smarty_tpl->tpl_vars['d']->value['msgId'];?>
">Hide</a></td>
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
