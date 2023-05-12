<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-05 11:47:35
         compiled from "application/views/templates/reports/crmExport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54759889659aed527170b32-41797294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5f9fa7faab74ac410983acae12c59544136f192' => 
    array (
      0 => 'application/views/templates/reports/crmExport.tpl',
      1 => 1497341013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54759889659aed527170b32-41797294',
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
  'unifunc' => 'content_59aed5272f6897_70394591',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59aed5272f6897_70394591')) {function content_59aed5272f6897_70394591($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>MiddleName</th>
                    <th>Salutation</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>JobTitle</th>
                    <th>DateOfBirth</th>
                    <th>StatusId</th>
                    <th>CreatedDate</th>
                    <th>CreatedBy</th>
                    <th>PrimaryEmail</th>
                    <th>PrimaryPhone</th>
                    <th>PrimaryAddress1</th>
                    <th>PrimaryAddress2</th>
                    <th>PrimaryState</th>
                    <th>PrimaryCity</th>
                    <th>PrimaryZip</th>
                    <th>Qualified</th>

                    <th>ParcelNumber</th>
                    <th>Company</th>
                    <th>Development</th>
                    <th>workorders</th>
                    <th>projects</th>

                    <th>primary category</th>
                    <th>AltContactName</th>
                    <th>OverHead</th>

                    <th>BillAddress</th>
                    <th>BillAddress</th>
                    <th>BillCity</th>
                    <th>BillState</th>
                    <th>BillZip</th>
                    <th>ShipAddress1</th>
                    <th>ShipAddress2</th>
                    <th>ShipCity</th>
                    <th>ShipState</th>
                    <th>ShipZip</th>
                    <th>Cell</th>
                    <th>Fax</th>
                    <th>Alt Email</th>

                </tr>
                </thead>
                <tbody>

                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                    <tr>


                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntMiddleName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntSalutation'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntGender'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntDepartment'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntJobTitle'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cntDateOfBirth'],"%m-%d-%Y");?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cntCreatedDate'],"%m-%d-%Y");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntCreatedBy'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryPhone'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryState'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryCity'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryZip'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntQualified'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntParcelNumber'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyLastName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['DevelopmentName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['DevelopmentLastName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['workorder_count'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['project_count'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['note_count'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['primarycat'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltContactName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntOverHead'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntBillAddress1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntBillAddress2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntBillCity'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntBillState'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntBillZip'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntShipAddress1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntShipAddress2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntShipCity'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntShipState'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntShipZip'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltPhone1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltPhone2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltEmail'];?>
</td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
<?php }} ?>
