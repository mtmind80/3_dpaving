<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-26 15:12:37
         compiled from "application/views/templates/bugs/bugList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90703306357c05c656a2113-74357803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c2885b34a6ff1c5acc6f6d83c7b8dc5b67d1251' => 
    array (
      0 => 'application/views/templates/bugs/bugList.tpl',
      1 => 1465508935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90703306357c05c656a2113-74357803',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57c05c656d6ec6_34262618',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57c05c656d6ec6_34262618')) {function content_57c05c656d6ec6_34262618($_smarty_tpl) {?>
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<?php echo '<script'; ?>
>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });



<?php echo '</script'; ?>
>

<!-- / Javascript -->
<div class="panel" >
<div class="panel-heading">

    <h2>Bugs</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/create/"><span class="btn-label icon fa fa-wrench"></span> Report Bug</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th style='width:20%;'>Bug Reported</th>
                    <th style='width:20%;'>Bug</th>
                    <th style='width:20%;'>Action</th>
                    <th style='width:20%;'>Respond</th>
                    <th style='width:20%;'>Test</th>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                   <?php if ($_smarty_tpl->tpl_vars['d']->value['bugFixed']) {?>
                 <tr >
                    <td><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['bugReportedBy'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['d']->value['bugReportedDate'];?>
</span></td>
                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['bugReport'];?>
</td>
                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['bugActionTaken'];?>

                    </td>
                    <td class="text-left">
                        Responder:<?php echo $_smarty_tpl->tpl_vars['d']->value['bugActionTakenBy'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['d']->value['bugActionTakenDate'];?>


                    </td>
                     <td class="text-left">
                         Tester:<?php echo $_smarty_tpl->tpl_vars['d']->value['bugTestedBy'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['d']->value['bugTestedDate'];?>

                         <br/><?php echo $_smarty_tpl->tpl_vars['d']->value['bugFixedNote'];?>

                     </td>

                    <?php } else { ?>
                       <tr >
                       <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['bugID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['bugReportedDate'];?>
 - <?php echo $_smarty_tpl->tpl_vars['d']->value['bugReportedBy'];?>
</span></a></td>
                       <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['bugReport'];?>
</td>
                       <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['bugActionTaken'];?>
</td>
                       <td class="text-left"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['bugID'];?>
">Respond</a></td>
                       <td class="text-left"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/test/<?php echo $_smarty_tpl->tpl_vars['d']->value['bugID'];?>
">Test</a>
                           <br/><?php echo $_smarty_tpl->tpl_vars['d']->value['bugFixedNote'];?>
</td>

                   <?php }?>
                </tr>
            <?php } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
