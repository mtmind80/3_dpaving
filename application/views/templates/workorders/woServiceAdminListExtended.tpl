<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-truck page-header-icon"></i>&nbsp;&nbsp;Manage Services</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <div class="pull-right col-xs-12 col-sm-auto">
                </div>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>


            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel grid-panel">
            <div class="panel-heading toolbar-container">
                <h2>Work Order Scheduled Services</h2>
                <div class="toolbar">
                    <a href="javascript:;" role="button" class="btn btn-large btn-primary" id="gmapModalOpen">Show on Map</a>
                    <a href="javascript:;" class="toggle btn btn-large btn-primary" id="toggle_filter_visibility">
                        Advanced Search
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="as-container">
                <form action="{$FILTER['url']}?{$FILTER['query']}" method="post">
                    <input type="hidden" name="_f" value="1">
                    <input type="hidden" name="f_service_ids" id="f_service_ids">
                    <input type="hidden" name="f_sales_manager_ids" id="f_sales_manager_ids">

                    <div class="as-content">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 item-container">
                                <label class="control-label">Status:</label>
                                <select class="form-control form-group-margin" name="f_status" id="f_status">
                                    {foreach $STATUS_CB as $key => $value}
                                        <option value="{$key}">{$value}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-3 item-container">
                                <label class="control-label">Customer Name:</label>
                                <select class="form-control form-group-margin" name="f_customer_id" id="f_customer_id">
                                    {foreach $CUSTOMERS_CB as $key => $value}
                                        <option value="{$key}">{$value}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-3 item-container">
                                <label class="control-label">Job Manager:</label>
                                <select class="form-control form-group-margin" name="f_job_manager_id" id="f_job_manager_id">
                                    {foreach $JOB_MANAGERS_CB as $key => $value}
                                        <option value="{$key}">{$value}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-3 item-container">
                                <label class="control-label">Sales Manager:</label>
                                <div class="checkbox-list-container">
                                    <select id="tmp_sales_manager_ids"  multiple="multiple" class="multiselect checkbox-list">
                                        {foreach $SALES_MANAGERS_CB as $key => $value}
                                            <option value="{$key}"{if (!empty($role->privilegeNames) && in_array($value, $role->privilegeNames))} selected="selected"{/if}>{$value}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3 item-container">
                                <label class="control-label">Service Category:</label>
                                <select class="form-control form-group-margin" name="f_service_category" id="f_service_category">
                                    {foreach $SERVICE_CATEGORIES_CB as $key => $value}
                                        <option value="{$key}">{$value}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-3 item-container">
                                <label class="control-label">Service Name:</label>
                                <div class="checkbox-list-container">
                                    <select id="tmp_service_ids" multiple="multiple" class="multiselect checkbox-list">
                                        {foreach $SERVICE_NAMES_CB as $key => $value}
                                            <option value="{$key}"{if (!empty($role->privilegeNames) && in_array($value, $role->privilegeNames))} selected="selected"{/if}>{$value}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 item-container">
                                <label class="control-label">Adress <span class="hint">(Enter Street, City, State or ZipCode)</span>:</label>
                                <div>
                                    <input name="f_address" id="f_address" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 submit-container">
                                <button type="button" id="reset_filter" data-url="{$FILTER['url']}" data-query="{$FILTER['query']}" class="btn btn-default">Reset</button>
                                <button type="button" id="go_filter" data-url="{$FILTER['url']}" data-query="{$FILTER['query']}" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <div class="table-primary">
                    {if count($ROWS)}
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered grid-table" id="workorder_list_table">
                            <thead>
                            <tr>
                                <td class="col-checkbox" title="Select/Unselect All">
                                    <input class="thead-checkbox toggle-checkbox" id="toggle" type="checkbox" />
                                </td>
                                {html_sorter sorter=$SORTER field='ServiceName' label='Service'}
                                {html_sorter sorter=$SORTER field='cntFirstName' label='Customer'}
                                {html_sorter sorter=$SORTER field='jordStatus' label='Status'}
                                {html_sorter sorter=$SORTER field='managerFirst' label='Assigned'}
                                <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach $ROWS as $row}
                                <tr class="" data-id="{$row['jobid']}" data-address="{$row['fullAdress']}" data-name="{$row['jordName']}">
                                    <td class="col-checkbox" title="Select/Unselect Row">
                                        <input class="tbody-checkbox" type="checkbox" value="{$row['jobid']}"/>
                                    </td>
                                    <td>
                                        {$row.ServiceName}
                                    </td>
                                    <td>
                                        {$row.cntFirstName} {$row.cntLastName}
                                    </td>
                                    <td>
                                        {$row.jordStatus}
                                    </td>
                                    <td>
                                        Sales: {$row.managerFirst} {$row.managerLast}
                                    </td>
                                    <td>
                                        Tools
                                    </td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    {else}
                        <p>No items found.</p>
                    {/if}
                </div>

            </div>
        </div>

        <div class="pagination-container">
            {html_paginator paginator=$PAGINATOR}
        </div>

    </div>
</div>

<!-- Button HTML (to Trigger Modal) -->
<a href="#gmapModal" role="button" class="btn btn-large btn-primary" data-toggle="modal" id="gmapModalTrigger" >Launch Demo Modal</a>

<!-- Modal HTML -->
<div id="gmapModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Show on Map</h4>
            </div>
            <div class="modal-body">
                <div id="map_canvas_modal"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


