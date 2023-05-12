<script>
	init.push(function () {						
		//$('#datepick').datepicker();
		//$('#duedatepick').datepicker();
	});
</script>
<div id="newcalevent" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title" id="myModalLabel">Add event</h4>
      </div>
      <div class="modal-body">
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
                    <input type="text" name="date" class="input-mini form-control" id="datepick">
                  </label>
                </div>
                <div class="editable-address">
                  <label><span>Due Date: </span>
                    <input type="text" name="duedate" class="input-mini form-control"  id="duedatepick">
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
    </div>
  </div>
</div>
