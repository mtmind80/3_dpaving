<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 19:53:03
         compiled from "application/views/templates/calendar/calListWO.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1840882812587d78ffa00564-28237789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ebb558bf3b0a1581bd9bfc87b3de300a3cbd255' => 
    array (
      0 => 'application/views/templates/calendar/calListWO.tpl',
      1 => 1465508937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1840882812587d78ffa00564-28237789',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'startdate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587d78ffa092e4_54371233',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587d78ffa092e4_54371233')) {function content_587d78ffa092e4_54371233($_smarty_tpl) {?>
<?php echo '<script'; ?>
>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '<?php echo $_smarty_tpl->tpl_vars['startdate']->value;?>
',
            editable: true,
            eventLimit: true, // allow "more" link when too many events

            events: {
                url: site_url + 'calendar/showcalendarWOdata/',
                error: function() {
                    $('#script-warning').html(site_url + 'calendar/showcalendarWOdata/');
                    $('#script-warning').show();
                }
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            }
        });


    });

<?php echo '</script'; ?>
>

<style>

    body {
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #script-warning {
        display: none;
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: red;
    }

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 10px;
    }

</style>


<div id='script-warning'>
    <code>cant find input file</code>.
</div>

<div id='loading'>loading...</div>

<div class="row">
    <div class="col-sm-12">

        <div class="panel">
            <div class="panel-heading">
                <h2>Scheduled Jobs</h2>

            </div>
            <div class="panel-body">
                <div id="calwrap">
                    <div class="widget-block  white-box calendar-box">
                        <div class="col-md-12 blue-box calendar no-padding">
                            <div id='wrap'>
                                <div id='calendar'></div>
                                <div style='clear:both'></div>
                            </div>
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }} ?>
