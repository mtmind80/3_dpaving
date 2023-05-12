<script>
init.push(function () {
	$('#popover-permit').popover({ 
			html : true,
			placement : 'bottom',
			title: function() {
			  return 'Permit Process';
			},
			content: function() {
			  return $("#popover-permit-content").html();
			}
		}).parent().delegate('button.editable-cancel', 'click', function() {
		$('#popover-permit').popover('hide');
	});
});

</script>

<div id="popover-head" class="hide">Permit Process</div>
<div id="popover-permit-content" class="hide">
  <form>
    <div class="control-group form-group">
      <div>
        <div class="editable-permit">
          <div class="editable-title">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" class="px">
              <span class="lbl">Preparation of Permit</span> </label>
          </div>
          <div class="editable-title">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" class="px">
              <span class="lbl">Permit Submitted</span> </label>
          </div>
          <div class="editable-title">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" class="px">
              <span class="lbl">Make Corrections to Permit</span> </label>
          </div>
          <div class="editable-title">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" class="px">
              <span class="lbl">Permit Approved</span> </label>
          </div>
         <br/>
          
        </div>
        <div class="editable-buttons">
          <button type="submit" class="btn btn-primary btn-sm editable-submit"><i class="glyphicon glyphicon-ok"></i></button>
          <button type="button" class="btn btn-default btn-sm editable-cancel"><i class="glyphicon glyphicon-remove"></i></button>
        </div>
      </div>
      <div class="editable-error-block help-block" style="display: none;"></div>
    </div>
  </form>
</div>
