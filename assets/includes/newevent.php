<script>
init.push(function () {
	$('#popover').popover({ 
			html : true,
			placement : 'bottom',
			title: function() {
			  return $("#popover-head").html();
			},
			content: function() {
			  return $("#popover-content").html();
			}
		}).parent().delegate('button.editable-cancel', 'click', function() {
		$('#popover').popover('hide');
	});
});

</script>

<div id="popover-head" class="hide">Add event</div>
<div id="popover-content" class="hide">
  <form>
    <div class="control-group form-group">

      <div>
        <div class="editable-address">

          <div class="editable-title">
            <label><span>Title: </span>
              <input type="text" name="title" class="input-small form-control">
            </label>
          </div>

          <div class="editable-address">
            <label><span>Description: </span>
              <input type="text" name="desc" class="input-small form-control">
            </label>
          </div>

          <div class="editable-address">
            <label><span>Date: </span>
              <input type="text" name="date" class="input-mini form-control">
            </label>
          </div>

          <div class="editable-address">
            <label><span>Address: </span>
              <input type="text" name="address" class="input-mini form-control">
            </label>
          </div>

          <div class="editable-address">
            <label><span>Assign:</span>
              <select class="input-mini  form-group-margin">
                    <option>Select Employee</option>
                    <option>Bob Smith</option>
                    <option>Barak Smith</option>
                    <option>Mel Gibson</option>
                    
               </select>
            </label>
          </div>

        </div> <!-- editable address -->
        <div class="editable-buttons">
          <button type="submit" class="btn btn-primary btn-sm editable-submit"><i class="glyphicon glyphicon-ok"></i></button>
          <button type="button" class="btn btn-default btn-sm editable-cancel"><i class="glyphicon glyphicon-remove"></i></button>
        </div>
      </div>
      <div class="editable-error-block help-block" style="display: none;"></div>
    </div>
  </form>
</div>
