<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-05-24 13:34:26
         compiled from "application/views/templates/tasks/taskComplete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190187633160abab623d0bd8-77405092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ea4147883732c17305e0ace76dba7ed18995a90' => 
    array (
      0 => 'application/views/templates/tasks/taskComplete.tpl',
      1 => 1497341046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190187633160abab623d0bd8-77405092',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'SITE_URL' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_60abab625dd099_17844417',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60abab625dd099_17844417')) {function content_60abab625dd099_17844417($_smarty_tpl) {?>
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

        if(form.taskResponse.value == '')
        {
            var msg = 'Please enter a comment. Like: "This task was completed."';
            $('#msg').html(msg);
            $('#privatemessage').modal('show');
            form.taskResponse.value = 'This task was completed.';
            form.taskResponse.focus();
            return false;
        }

        return true;

    }


<?php echo '</script'; ?>
>


<div class="panel" >
<div class="panel-heading">

    <?php if ($_smarty_tpl->tpl_vars['user']->value['cntcid']==9) {?>
        <h2>Complete Task:<?php echo $_smarty_tpl->tpl_vars['user']->value['cntFirstName'];?>
</h2>
    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['cntcid']==10) {?>
        <h2>Complete Task:<?php echo $_smarty_tpl->tpl_vars['user']->value['cntFirstName'];?>
</h2>
    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['cntcid']==8) {?>
        <h2>Complete Task:<?php echo $_smarty_tpl->tpl_vars['user']->value['cntFirstName'];?>
</h2>
    <?php } else { ?>
        <h2>Complete Task:<?php echo $_smarty_tpl->tpl_vars['user']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['cntLastName'];?>
</h2>
    <?php }?>

    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>

</div>

<div class="panel-body">
<form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/saveC/<?php echo $_smarty_tpl->tpl_vars['data']->value['taskID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
    <input type='hidden' name='taskDescription' id='taskDescription' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['taskDescription'];?>
'>
    <input type='hidden' name='taskAssignedTo' id='taskAssignedTo' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['taskAssignedTo'];?>
'>
    <input type='hidden' name='taskCreatedBy' id='taskCreatedBy' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['taskCreatedBy'];?>
'>
    <input type='hidden' name='cntId' id='cntId' value='<?php echo $_smarty_tpl->tpl_vars['user']->value['cntId'];?>
'>
<input type='hidden' name='taskID' id='taskID' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['taskID'];?>
'>


    <!-- begin row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">Complete This Task</label>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['taskDescription'];?>

            </div>
        </div>

    </div>
    <!-- row -->

    <!-- begin row -->
<div class="row">
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">Please add your comments</label>
            <textarea rows="3" id="taskResponse" name="taskResponse" class="form-control"></textarea>
        </div>
    </div>

    </div>
    <!-- row -->


    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Complete Task </a>
    </div>

</div>
</form>
    </div>
</div>
<?php }} ?>
