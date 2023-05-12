<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-24 14:41:51
         compiled from "application/views/templates/crm/crmExport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1834123305887bc0f361848-15874943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbd2d1a71ee0dd5a10e5d4be63d3099b0db5932c' => 
    array (
      0 => 'application/views/templates/crm/crmExport.tpl',
      1 => 1476068445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1834123305887bc0f361848-15874943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5887bc0f41b6d9_43930595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5887bc0f41b6d9_43930595')) {function content_5887bc0f41b6d9_43930595($_smarty_tpl) {?>            <table>
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
