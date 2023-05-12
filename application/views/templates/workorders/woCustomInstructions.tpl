{* Estimator uses this to get to added cost during close from dashboard *}

<script type="text/javascript">



init.push(function () {

});



function CHECKIT(form)
{
    if(!test(form)){ return;

    }

    form.submit();

}

function test(form)
{


    if(form.jordCustomNote.value == '')
    {
        alert('Enter a custom note');
        form.jordCustomNote.focus();
        return false;
    }


    return true;
}


function countme(strinput)
{
    var tcount = 1000;
    var l = strinput.length;
    if(l > tcount)
    {
        $("#tcount").html('<span style="color:Red;">' + l + ' too many characters ' + tcount + ' allowed</span>');
         return;
    }
    $("#tcount").html('(<i>' +l + ' characters  ' + tcount + ' allowed</i>)');
}
</script>




<div class="panel">

   <div class="panel-body">



   <div id="Proposalheader">
       <h2>Enter a custom note for this service.</h2>

       <h1>{$proposalDetails['jordName']}</h1>
       <br/>
   </div>
   <!-- begin row -->

   <div class="row"  style='padding:10px;'>



           <form action="{$SITE_URL}workorders/woSaveCustomNote/{$pid}/{$sid}"  name="dataform" id="dataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="pid" id="pid" value="{$pid}">
               <input type="hidden" name="sid" id="sid" value="{$sid}">

               <div class="row" >
                   <div class="col-sm-2">
                       <label class="control-label">Service Note</label>
                   </div>
                   <div class="col-sm-8">
                       <textarea  cols="45" rows="3" name='jordCustomNote' id='jordCustomNote' OnKeyUp="countme(this.value);">{$proposalDetails['jordCustomNote']}</textarea>
                       <div class='alert-info' style='width:350px;font-size:0.8EM' id='tcount'>0 characters</div>
                   </div>
                   <div class="col-xs-2">

                   </div>
               </div>


              <br />

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save Custom Note</a>
                   </div>
                   <div class="col-sm-3">
                       <a href="Javascript:window.location.href='{$SITE_URL}workorders/WOPreview/{$pid}';" class="btn btn-primary btn-labeled">Cancel</a>
                   </div>

               </div>

           </form>


   </div>
</div>
   </div>



