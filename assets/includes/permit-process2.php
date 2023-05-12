<script>
init.push(function () {
	$('#popover-permit2').popover({ 
			html : true,
			placement : 'bottom',
			title: function() {
			  return 'Permit Type 2';
			},
			content: function() {
			  return $("#popover-permit-2").html();
			}
		}).parent().delegate('button.editable-cancel', 'click', function() {
		$('#popover-permit2').popover('hide');
	});
});

</script>

<div id="popover-head" class="hide">Permit Type 2</div>
<div id="popover-permit-2" class="hide">
  <form>
    <div class="control-group form-group">
      <div>
        <div class="editable-permit">
          
          <div class="editable-title">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" class="px">
              <span class="lbl">Schedule inspection</span> </label>
          </div>
          <div class="editable-title">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" class="px">
              <span class="lbl">Re-schedule inspection</span> </label>
          </div>
          <div class="editable-title">
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" class="px">
              <span class="lbl">Permit Closed</span> </label>
          </div><br/>
          
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
