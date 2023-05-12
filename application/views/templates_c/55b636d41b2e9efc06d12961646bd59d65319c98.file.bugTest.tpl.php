<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-26 08:22:27
         compiled from "application/views/templates/bugs/bugTest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1396791651588a062351f3b9-55191059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b636d41b2e9efc06d12961646bd59d65319c98' => 
    array (
      0 => 'application/views/templates/bugs/bugTest.tpl',
      1 => 1465508935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1396791651588a062351f3b9-55191059',
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
  'unifunc' => 'content_588a0623563f73_71790275',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588a0623563f73_71790275')) {function content_588a0623563f73_71790275($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.bugFixedNote.value == '')
        {
            alert('You must enter a note ');
            form.bugFixedNote.focus();
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
     bugFixedNote

     */
<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Bug Report Validation</h2>
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
                        <label class="control-label">Tested Date: </label> <?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>

                        <input type="hidden" id='bugTestedDate' name="bugTestedDate" value ="<?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Tested By:</label> <?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>

                        <input type="hidden" id='bugTestedBy' name="bugTestedBy" value ="<?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Fixed</label>
                        <input type="radio" value="1" name="bugFixed" > YES
                        <input type="radio" value="0" name="bugFixed" > NO
                    </div>
                </div>
            </div>
            <!-- row -->

              <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Note</label>
                        <textarea class="form-control form-group-margin" name="bugFixedNote" id="bugFixedNote"></textarea>
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
