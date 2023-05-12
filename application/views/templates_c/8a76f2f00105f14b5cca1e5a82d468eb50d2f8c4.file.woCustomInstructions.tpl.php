<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-13 16:43:14
         compiled from "application/views/templates/workorders/woCustomInstructions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1393223822573dfc5b3e5751-32459169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a76f2f00105f14b5cca1e5a82d468eb50d2f8c4' => 
    array (
      0 => 'application/views/templates/workorders/woCustomInstructions.tpl',
      1 => 1465508958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1393223822573dfc5b3e5751-32459169',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573dfc5b3fb306_64791036',
  'variables' => 
  array (
    'proposalDetails' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573dfc5b3fb306_64791036')) {function content_573dfc5b3fb306_64791036($_smarty_tpl) {?>

<?php echo '<script'; ?>
 type="text/javascript">



init.push(function () {

});



function CHECKIT(form)
{
    if(!test(form)){ return;

    }

    form.submit();

}

function test(form)
{


    if(form.jordCustomNote.value == '')
    {
        alert('Enter a custom note');
        form.jordCustomNote.focus();
        return false;
    }


    return true;
}


function countme(strinput)
{
    var tcount = 1000;
    var l = strinput.length;
    if(l > tcount)
    {
        $("#tcount").html('<span style="color:Red;">' + l + ' too many characters ' + tcount + ' allowed</span>');
         return;
    }
    $("#tcount").html('(<i>' +l + ' characters  ' + tcount + ' allowed</i>)');
}
<?php echo '</script'; ?>
>




<div class="panel">

   <div class="panel-body">



   <div id="Proposalheader">
       <h2>Enter a custom note for this service.</h2>

       <h1><?php echo $_smarty_tpl->tpl_vars['proposalDetails']->value['jordName'];?>
</h1>
       <br/>
   </div>
   <!-- begin row -->

   <div class="row"  style='padding:10px;'>



           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/woSaveCustomNote/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="dataform" id="dataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">

               <div class="row" >
                   <div class="col-sm-2">
                       <label class="control-label">Service Note</label>
                   </div>
                   <div class="col-sm-8">
                       <textarea  cols="45" rows="3" name='jordCustomNote' id='jordCustomNote' OnKeyUp="countme(this.value);"><?php echo $_smarty_tpl->tpl_vars['proposalDetails']->value['jordCustomNote'];?>
</textarea>
                       <div class='alert-info' style='width:350px;font-size:0.8EM' id='tcount'>0 characters</div>
                   </div>
                   <div class="col-xs-2">

                   </div>
               </div>


              <br />

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save Custom Note</a>
                   </div>
                   <div class="col-sm-3">
                       <a href="Javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPreview/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
';" class="btn btn-primary btn-labeled">Cancel</a>
                   </div>

               </div>

           </form>


   </div>
</div>
   </div>



<?php }} ?>
