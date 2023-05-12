<script>
init.push(function () {
	$('#popover-permit-new').popover({ 
			html : true,
			placement : 'bottom',
			title: function() {
			  return 'New Permit';
			},
			content: function() {
			  return $("#popover-permit-new-content").html();
			}
		}).parent().delegate('button.editable-cancel', 'click', function() {
		$('#popover-permit-new').popover('hide');
	});
});

</script>

<div id="popover-head" class="hide">New Permit</div>
<div id="popover-permit-new-content" class="hide">
  <form>
    <div class="control-group form-group">
      <div>
        <div class="editable-permit">
          <div class="editable-title">
            <label><span>Title: </span>
              <input type="text" name="title" class="input-small form-control">
            </label>
          </div>
          <div class="editable-title">
            <label><span>Type: </span>
             <select class="form-control form-group-margin">
										<option>Type 1</option>
										<option>Type 2</option>
				</select>
            </label>
          </div>
          <div class="editable-title">
            <label><span>Hours: </span>
              <input type="text" name="hours" class="input-small form-control">
            </label>
          </div>
          <div class="editable-title">
            <label><span>Document: </span>
                              
                                <input type="file"  class="form-control" name="doc">
              </label>               
         </div>
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
