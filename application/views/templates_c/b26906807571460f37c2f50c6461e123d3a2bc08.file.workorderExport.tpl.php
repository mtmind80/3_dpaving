<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-01-19 19:42:43
         compiled from "application/views/templates/reports/workorderExport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42349865061e869b3259237-89419459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b26906807571460f37c2f50c6461e123d3a2bc08' => 
    array (
      0 => 'application/views/templates/reports/workorderExport.tpl',
      1 => 1497341024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42349865061e869b3259237-89419459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_61e869b3462f10_94286721',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61e869b3462f10_94286721')) {function content_61e869b3462f10_94286721($_smarty_tpl) {?>             <table>
                <thead>
                <tr>
                    <th>Work Order</th>
                    <th>Proposal ID</th>
                    <th>Name</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>Primary Contact</th>
                    <th>Primary Email</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Zip</th>
                    <th>Status</th>
                    <th>Approved Date</th>
                    <th>Approved</th>
                    <th>Rejected Date</th>
                    <th>Rejected Reason</th>
                    <th>Created DateTime</th>
                    <th>Client</th>
                    <th>Created By</th>
                    <th>Sales Person</th>
                    <th>Sales Manager</th>
                    <th>AlertNote</th>
                    <th>Cost</th>
                    <th>Services </th>


                </tr>
                </thead>
                <tbody>

                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <tr>

                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['p']->value['jobMasterNumber']);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobPrimaryContact'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobPrimaryEmail'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobState'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobCity'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobZip'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['ordStatus'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobApprovedDate'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobApproved'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobRejectedDate'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobRejectedReason'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobCreatedDateTime'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['clientlast'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['salesfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['saleslast'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['managerfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['managerlast'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['jobAlertNote'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['totalcost'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['services'];?>
</td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
<?php }} ?>
