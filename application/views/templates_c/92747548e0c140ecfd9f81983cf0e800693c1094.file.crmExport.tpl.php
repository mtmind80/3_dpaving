<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-10 03:00:50
         compiled from "application/views/templates/crm/crmExport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19908783957f6692e1d3d83-50546655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92747548e0c140ecfd9f81983cf0e800693c1094' => 
    array (
      0 => 'application/views/templates/crm/crmExport.tpl',
      1 => 1476068445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19908783957f6692e1d3d83-50546655',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57f6692e1f8d16_55268718',
  'variables' => 
  array (
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f6692e1f8d16_55268718')) {function content_57f6692e1f8d16_55268718($_smarty_tpl) {?>            <table>
                <thead>
                <tr>
                    <th>Salutation</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>MI</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>

                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                    <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntSalutation'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntMiddleName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryPhone'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryCity'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryState'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryZip'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail'];?>
</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
<?php }} ?>
