<script>
					init.push(function () {
						

						$('#bs-datepicker-component').datepicker();

						
					});
				</script>

<div class="stat-panel bordered" >

  <!-- Without padding, extra small text -->
  <div class="stat-cell col-xs-12 no-padding valign-middle">
    <!-- Add parent div.stat-rows if you want build nested rows -->
    <div class="stat-rows">
      <div class="stat-row">
        <form action="" class="panel form-horizontal">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Estimator</label>
                  <select class="form-control form-group-margin">
                    <option>Bob</option>
                    <option>Mary</option>
                    <option>John</option>
                    <option>Jason</option>
                    <option>Mirinda</option>
                  </select>
                </div>
              </div>
              <!-- col-sm-6 -->
              <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Project Manager</label>
                  <input type="text" name="lastname" class="form-control">
                </div>
              </div>
              <!-- col-sm-6 -->
            </div>
            <!-- row -->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Date</label>
                  <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                </div>
              </div>
              <!-- col-sm-6 -->
              <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Opportunity Name</label>
                  <input type="url" name="website" class="form-control">
                </div>
              </div>
              <!-- col-sm-6 -->
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Client</label>
                  <p class="note-title"><b>Burger king</b><br>
                    6714 NW 20th Avenue, Fort Lauderdale, Florida 33309<br>
                    888-432-5555<br>
                    <a href="#">xyz@burgerking.com</a></p>
                </div>
              </div>
              <!-- col-sm-6 -->
              <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Job site</label>
                  <textarea class="form-control" rows="3">Address</textarea>
                  <input type="text" name="add2" class="form-control" placeholder="CITY, STATE, ZIP">
                </div>
              </div>
              <!-- col-sm-6 -->
            </div>
            <!-- row -->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Job#</label>
                  <input type="url" name="jobid" class="form-control">
                </div>
              </div>
              <!-- col-sm-6 -->
              <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                  <label class="control-label">NTO</label>
                  <p class="form-control label label-danger">No</p>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Permit</label>
                  <span class="form-control label label-success">Yes</span> </div>
              </div>
              <!-- col-sm-6 -->
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.stat-rows -->
  </div>
  <!-- /.stat-cell -->
</div>
<script>
					init.push(function () {
						$('#jq-1').dataTable( {
								"dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
		"t"+
		"<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
								"language": {
            "lengthMenu": "Show: _MENU_ Rows" }
							}  );
						//$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
						$('#jq-1 .dataTables_filter input').attr('placeholder', 'Search...');
					});
				</script>
<div class="panel">
                    <div class="panel-body">
                      <div class="table-primary">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-1">
                          <thead>
                            <tr>
                              <th>Proposal #</th>
                              <th>Status</th>
                              <th>Customer Price $</th>
                              <th>Breakeven $</th>
                              <th>Profit $</th>
                              <th>GP%</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="odd gradeX">
                              <td><span class="note-title"><b>Rock</b></span></td>
                              <td><span class="label label-warning">On-going</span></td>
                              <td>12,500</td>
                              <td><span class="note-title">5,700</span></td>
                              <td><span class="note-title">6,800</span></td>
                              <td><span class="note-title">54.40</span></td>
                            </tr>
                            <tr class="even gradeC">
                              <td><span class="note-title"><b>Exc-Subgrade</b></span></td>
                              <td><span class="label label-success">OK</span></td>
                              <td>12,500</td>
                              <td><span class="note-title">5,700</span></td>
                              <td><span class="note-title">6,800</span></td>
                              <td><span class="note-title">54.40</span></td>
                            </tr>
                            <tr class="odd gradeX">
                              <td><span class="note-title"><b>Sealcoating</b></span></td>
                              <td><span class="label label-danger">NO Start</span></td>
                              <td>12,500</td>
                              <td><span class="note-title">5,700</span></td>
                              <td><span class="note-title">6,800</span></td>
                              <td><span class="note-title">54.40</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
