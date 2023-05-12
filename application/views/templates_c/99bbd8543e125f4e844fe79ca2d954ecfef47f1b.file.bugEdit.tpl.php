<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-26 08:22:01
         compiled from "application/views/templates/bugs/bugEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2146323881588a060997fff8-15356525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99bbd8543e125f4e844fe79ca2d954ecfef47f1b' => 
    array (
      0 => 'application/views/templates/bugs/bugEdit.tpl',
      1 => 1465508935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2146323881588a060997fff8-15356525',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'CurrentDate' => 0,
    'USER_FULLNAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_588a06099c2b88_27702642',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588a06099c2b88_27702642')) {function content_588a06099c2b88_27702642($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.bugActionTaken.value == '')
        {
            alert('You must enter bug action taken ');
            form.bugActionTaken.focus();
            return false;
        }

        return true;

    }
    /*
     bugReportedDate
     bugReportedBy
     bugReport
     bugProject
     bugURL
     bugImage
     bugActionTaken
     bugActionTakenBy
     bugActionTakenDate
     bugTestedDate
     bugTestedBy
     bugFixed

     */
<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Bug Report Response</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/"><span class="btn-label icon fa fa-asterisk"></span> List Bugs</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/save/<?php echo $_smarty_tpl->tpl_vars['data']->value['bugID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <input type="hidden" id='id' name="id" value ="<?php echo $_smarty_tpl->tpl_vars['data']->value['bugID'];?>
">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Project:</label> 3D Paving

                    </div>
                </div>

            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Action Taken Date: </label> <?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>

                        <input type="hidden" id='bugActionTakenDate' name="bugActionTakenDate" value ="<?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Action Taken By:</label> <?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>

                        <input type="hidden" id='bugActionTakenBy' name="bugActionTakenBy" value ="<?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">URL</label>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['bugURL'];?>

                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Report</label>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['bugReport'];?>

                    </div>
                </div>
            </div>
            <!-- row -->

              <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Action Taken</label>
                        <textarea class="form-control form-group-margin" name="bugActionTaken" id="bugActionTaken"></textarea>
                    </div>
                </div>
            </div>
            <!-- row -->

    <!-- buton row -->
        <div class="row">
        <div class="col-sm-3">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Bug</a>
        </div>
        <div class="col-sm-3">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
