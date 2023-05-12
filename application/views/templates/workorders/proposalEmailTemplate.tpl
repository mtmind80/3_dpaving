
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {
        form.submit();
    }

</script>

<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<script>
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
</script>

<div class="panel">
    <div class="panel-heading">
          <h2>Create Proposal Email Tempates</h2>

        <h4>Add reminders to be sent out to clients.</h4>

        <!--
        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
-->
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>

    <div class="wizard-wrapper">
        
    </div>
   <div class="panel-body">

       {include file='projects/_proposalEmailTemplateHeader.tpl'}

           <form action="{$SITE_URL}workorders/saveProposalEmailTemplate"  name="dataform" id="dataform" class="panel" method="POST">

               <!-- row -->
               <!-- begin row -->
               <div class="row">
               	<div class="col-sm-6">
                	<div class="form-group no-margin-hr">
                    	<label class="control-label">Email Subject</label>
                        <input type="text" name="emailTemplateSubject" id="emailTemplateSubject" class="form-control">
                    </div>
                </div>
                </div>
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr"> 
                           <label class="control-label">Email Message</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control">[client_name] [project_description] [custom_message] [todays_date] </textarea>
                       </div>
                   </div>
               </div>

               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Create Email Template</a>
                   </div>

               </div>
           </form>

       <!-- /11. $JQUERY_DATA_TABLES -->
       <!-- /11. $JQUERY_DATA_TABLES -->

   </div>
</div>

