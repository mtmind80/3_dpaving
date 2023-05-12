<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-20 13:11:34
         compiled from "application/views/templates/workorders/woSchedule.tpl" */ ?>
<?php /*%%SmartyHeaderCode:987614905588260e67a72c8-66757953%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2887a5087ca19484f052f80240af3c4733879667' => 
    array (
      0 => 'application/views/templates/workorders/woSchedule.tpl',
      1 => 1465508960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '987614905588260e67a72c8-66757953',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'details' => 0,
    'proposal' => 0,
    'permitsnotapproved' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_588260e6840ac4_66597876',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588260e6840ac4_66597876')) {function content_588260e6840ac4_66597876($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });
        $('#ba-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });



    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.jordAddress1.value == '')
        {
            alert('You must enter a value for address');
            form.jordAddress1.focus();
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
       <h2>LOCATION AND SCHEDULE: <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
</h2>
   </div>
   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

           <div class="row">

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       Client:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientlast'];?>

                       <br />
                       Location:
                       <?php if ($_smarty_tpl->tpl_vars['details']->value['jordAddress1']!='') {?>
                       <a href="Javascript:showUserOnMap('<?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
', '<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
. <?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                       <a href="https://www.google.com/#q=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['details']->value['jordAddress1'],' ','+');?>
+<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['details']->value['jordCity'],' ','+');?>
+<?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
+<?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                       <?php }?>

                       <br/>


                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>

                       &nbsp;
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>

                       <br />
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
,
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
.
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>


                       <br />
                       Parcel: <?php echo $_smarty_tpl->tpl_vars['details']->value['jordParcel'];?>

                       <br />
                       Start Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordStartDate'],"%A, %B %e, %Y");?>


                       <br />
                       End Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordEndDate'],"%A, %B %e, %Y");?>


                   </div>
               </div>
               <div class="col-sm-5">
                   <strong>PROPOSAL:</strong>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordProposalText'];?>

               </div>
           </div>
           <!-- row -->


       </div>
<?php if ($_smarty_tpl->tpl_vars['permitsnotapproved']->value>0) {?>
You cannot schedule this service until all permits are approved.<br/>
    <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/workorders/WOPermits/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
'>Click Here</a>
<?php } else { ?>


       <div class="row panel"  style='border:1px #000000 solid;'>
       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWOSchedule/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="adataform" id="adataform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

           <h3>Service Location</h3>
        <div class="row">
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Start Date</label>
                       <div class="input-group date" id="bs-datepicker-component">
                           <input type="text" id="jordStartDate" name="jordStartDate"
                                  class="form-control" value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordStartDate'],"%m/%d/%Y");?>
'>
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">End Date</label>
                       <div class="input-group date" id="ba-datepicker-component">
                           <input type="text" id="jordEndDate" name="jordEndDate"
                                  class="form-control" value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordEndDate'],"%m/%d/%Y");?>
'>
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>

        </div>

        <div class="row">

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Address Line 1</label>
                       <input type="text" id="jordAddress1" name="jordAddress1" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>
">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Address line 2</label>
                       <input type="text" id="jordAddress2" name="jordAddress2" class="form-control"  size="45" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>
">
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Parcel number</label>
                       <input type="text" id="jordParcel" name="jordParcel" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordParcel'];?>
">
                   </div>
               </div>
        </div>
           <!-- row -->
           <!-- begin row -->
           <div class="row">
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">City</label>
                       <input type="text" id="jordCity" name="jordCity" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
">
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> State</label>
                       <select id="jordState" name="jordState" class="form-control" >
                           <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
"><?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
</option>
                           <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                       </select>
                   </div>
               </div>

               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Zip Code</label>
                       <input type="text" id="jordZip" name="jordZip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
">
                   </div>
               </div>

           </div>
           <!-- buton row -->
           <div class="row">
               <div class="col-sm-3">
                   <a href="Javascript:CHECKIT(this.adataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
               </div>

           </div>
           <!-- end services form -->
           </form>


       </div>
<?php }?>

   </div>
   </div>








<?php }} ?>
