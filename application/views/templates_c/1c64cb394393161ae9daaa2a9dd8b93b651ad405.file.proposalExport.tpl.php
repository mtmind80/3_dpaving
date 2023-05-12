<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-14 11:45:33
         compiled from "application/views/templates/reports/proposalExport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51165546859393f96751875-84519524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c64cb394393161ae9daaa2a9dd8b93b651ad405' => 
    array (
      0 => 'application/views/templates/reports/proposalExport.tpl',
      1 => 1497341018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51165546859393f96751875-84519524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59393f9687a257_50609506',
  'variables' => 
  array (
    'data' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59393f9687a257_50609506')) {function content_59393f9687a257_50609506($_smarty_tpl) {?>            <table>
                <thead>
                <tr>
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
