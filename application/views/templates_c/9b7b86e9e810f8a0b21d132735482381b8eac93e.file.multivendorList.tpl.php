<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-28 20:12:34
         compiled from "application/views/templates/resources/multivendorList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19739180757460219331c05-17068627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b7b86e9e810f8a0b21d132735482381b8eac93e' => 
    array (
      0 => 'application/views/templates/resources/multivendorList.tpl',
      1 => 1465508955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19739180757460219331c05-17068627',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57460219376450_22736828',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'zcount' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57460219376450_22736828')) {function content_57460219376450_22736828($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

    $( document ).ready(function() {

    $('.myclass').each(function(){
        $(this).attr('oldval',$(this).val());
    });

    $('.myclass').on('change',function(){
        var val = $(this).val();
        var toldval = $(this).attr('oldval');
        if(val != $(this).attr('oldval') ){

            if(parseFloat(val) != val)
            {
                alert('You must always enter a valid number.');
                $(this).val(toldval);
                $(this).focus();
            }

        }
    });


    });


   function CHECKPRICE(form)
    {
        if(!testprice(form)){ return;
    }
    form.submit();
    }

    function testprice(form)
    {

        if(parseFloat(form.STANDARD.value) != form.STANDARD.value)
        {
            alert('You must enter a valid number for STANDARD');
            form.STANDARD.focus();
            return false;
        }
        if(parseFloat(form.PFS.value) != form.PFS.value || parseFloat(form.PFS.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for PFS, that is lower or equal to our "Standard Rate"');
            form.PFS.focus();
            return false;
        }


        if(parseFloat(form.All_Striping.value) != form.All_Striping.value || parseFloat(form.All_Striping.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for All Striping, that is lower or equal to our "Standard Rate"');
            form.All_Striping.focus();
            return false;
        }


        if(parseFloat(form.Native_Lines.value) != form.Native_Lines.value || parseFloat(form.Native_Lines.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for Native Lines, that is lower or equal to our "Standard Rate"');
            form.Native_Lines.focus();
            return false;
        }


        if(parseFloat(form.Scott_Munroe.value) != form.Scott_Munroe.value  || parseFloat(form.Scott_Munroe.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for Scott Munroe, that is lower or equal to our "Standard Rate"');
            form.Scott_Munroe.focus();
            return false;
        }






        return true;

    }

<?php echo '</script'; ?>
>
<div class="panel" >
<div class="panel-heading">

    <h2>Multi Vendor Striping Pricing</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/addMultivendor/"><span class="btn-label icon fa fa-shield"></span> Add Multi Vendor Services</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" style="width:100%;" id="jq-datatables-example">
    <tr style='background:#7dcde5'>
                    <td >Service</td>
                    <td >Description</td>
                    <td >Standard Rate</td>
                    <td >PFS</td>
                    <td >All Striping</td>
                    <td >Native Lines</td>
                    <td >Scott Munroe</td>
                    <td >Update</td>
                </tr>

     <?php $_smarty_tpl->tpl_vars["zcount"] = new Smarty_variable(0, null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>

              <?php $_smarty_tpl->tpl_vars['zcount'] = new Smarty_variable($_smarty_tpl->tpl_vars['zcount']->value+1, null, 0);?>
              <?php if ($_smarty_tpl->tpl_vars['zcount']->value==10) {?>
                <tr style='background:#7dcde5'>
                    <td >Service</td>
                    <td >Description</td>
                    <td >Standard Rate</td>
                    <td >PFS</td>
                    <td >All Striping</td>
                    <td >Native Lines</td>
                    <td >Scott Munroe</td>
                    <td >Update</td>
                </tr>
                <?php $_smarty_tpl->tpl_vars['zcount'] = new Smarty_variable(0, null, 0);?>

            <?php }?>
                <form method="POST" name="dataform<?php echo $_smarty_tpl->tpl_vars['d']->value['ScatID'];?>
" id="dataform<?php echo $_smarty_tpl->tpl_vars['d']->value['ScatID'];?>
"  action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveMultiVendor/<?php echo $_smarty_tpl->tpl_vars['d']->value['ScatID'];?>
">
                    <input type="hidden" name="beenhere" value="1">
                    <input type="hidden" name="ScatID" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ScatID'];?>
">
                <tr style='background:#ffffff'>
                    <td class="text-left" style='background:#e3e3e3'><?php echo $_smarty_tpl->tpl_vars['d']->value['SERVICE'];?>
</td>
                    <td class="text-left"><textarea class="form-control" id='SERVICE_DESC<?php echo $_smarty_tpl->tpl_vars['d']->value['ScatID'];?>
' name='SERVICE_DESC' rows='2'><?php echo $_smarty_tpl->tpl_vars['d']->value['SERVICE_DESC'];?>
</textarea>
                        </td>
                    <td class="text-center">


                         <input type='text' class="myclass" size="4" name='STANDARD' value='<?php echo number_format($_smarty_tpl->tpl_vars['d']->value['STANDARD'],2,".",",");?>
'>
                    </td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='PFS' value='<?php echo number_format($_smarty_tpl->tpl_vars['d']->value['PFS'],2,".",",");?>
'></td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='All_Striping' value='<?php echo number_format($_smarty_tpl->tpl_vars['d']->value['All_Striping'],2,".",",");?>
'></td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='Native_Lines' value='<?php echo number_format($_smarty_tpl->tpl_vars['d']->value['Native_Lines'],2,".",",");?>
'></td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='Scott_Munroe' value='<?php echo number_format($_smarty_tpl->tpl_vars['d']->value['Scott_Munroe'],2,".",",");?>
'></td>
                    <td class="text-center">
                            <input type="button" value="Update" onClick="CHECKPRICE(this.form);" />
                            </form>
                    </td>
                </tr>
            <?php } ?>

       </table>

</div>
    </div>
</div>

<?php }} ?>
