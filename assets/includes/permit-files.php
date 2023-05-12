<script>
init.push(function () {
	$('#popover-files').popover({ 
			html : true,
			placement : 'left',
			title: function() {
			  return 'Permit Files';
			},
			content: function() {
			  return $("#popover-permit-files").html();
			}
		}).parent().delegate('button.editable-cancel', 'click', function() {
		$('#popover-files').popover('hide');
	});
});

</script>

<div id="popover-head" class="hide">Permit Files</div>
<div id="popover-permit-files" class="hide">
  <form>
    <div class="control-group form-group">
      <div>
        <div class="editable-permit">
          <div class="editable-title">
            <label class="checkbox-inline">
              
              <span class="lbl">File 1</span> </label>
          </div>
          <div class="editable-title">
            <label class="checkbox-inline">
              
              <span class="lbl">File 2</span> </label>
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
