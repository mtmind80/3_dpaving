
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {

        form.submit();
    }

    function test(form)
    {

        if(form.tinyMCETextarea.value == '')
        {
            alert('You must enter a note');
            form.jnotNote.focus();
            return false;
        }


        return true;

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

    {include file='workorders/_workorderwizrdmenu.tpl'}

    <div class="panel-body">

        {assign var="lead" value="Notes For "}

        {include file='workorders/_workorderheader.tpl'}

       
           <form action="{$SITE_URL}workorders/CloseoutWO/{$pid}"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="{$pid}">


<!-- begin row -->
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6 col-md-6">
                      <div class="form-group no-margin-hr">
                           <label class="control-label">Email Title</label>
                           <input type="text" id="cnotEmailTitle" name="cnotEmailTitle" class="form-control">
                      </div>
                   	 </div>
                   <div class="col-sm-12">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Email Body</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                        
                  <div class="col-sm-3">
                          <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="{$userInfo['USER_EMAIL']}" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="{$proposal.cntPrimaryEmail}" class="checkbox-inline">
                  </div>
               </div>
               
               <div class="row">
               	<div class="col-sm-12">
                <h3>Select Which Images You Would Like To Attach To The Email</h3>
                {foreach from=$media item=image}
                	<div class="col-sm-3" style="min-height: 300px; max-height:275px;">
                        <label class="control-label">Include File In Email</label>
                        <input type="checkbox" class="form-check" name="cnotSelectedImage[]" value="{$image.imageName}">
                         <img src="{$image.imagePath}" style="max-width:100%; max-height:250px">
                    </div>
                {/foreach}
                </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-danger btn-labeled">Close Project</a>
                   </div>

               </div>
           </form>


   </div>
 </div>


