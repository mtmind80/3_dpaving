<div class="right-sidebar col-sm-4">
<div class="stat-panel">
        <!--calendar widget -->
        <div class="stat-row">
                <div class="stat-cell">
                  <!--calendar widget -->
                  <?php include ("assets/includes/calendarwidget.php"); ?>
                  <!--calendar widget ends here -->
                </div>
              </div>
        <!--calendar widget ends here -->
        <!--events start-->
        <div class="stat-row">
                <div class="stat-cell">
        <div class="eventswrapper"  style="min-height:350px;">
          <h2>My Events</h2>
          <span class="btn center-block text-center"> <a id="popover" data-toggle="popover">add event</a> </span>
                    <?php include ("assets/includes/newevent.php"); ?>
          <div class="notifications-list">
            <div class="notification">
              <div class="notification-description">Dinner with my family.
                <div class="notification-ago">
                  <div class="notification-icon fa fa-clock-o"></div>
                  &nbsp;12h ago</div>
              </div>
            </div>
            <!-- / .notification -->
            <div class="notification">
              <div class="notification-description">Meeting with partners.
                <div class="notification-ago">
                  <div class="notification-icon fa fa-clock-o"></div>
                  &nbsp;12h ago</div>
              </div>
            </div>
            <!-- / .notification -->
            <div class="notification">
              <div class="notification-description">Work in new project.
                <div class="notification-ago">
                  <div class="notification-icon fa fa-clock-o"></div>
                  &nbsp;12h ago</div>
              </div>
            </div>
            <!-- / .notification -->
            <div class="notification">
              <div class="notification-description">Go to doctor.
                <div class="notification-ago">
                  <div class="notification-icon fa fa-clock-o"></div>
                  &nbsp;12h ago</div>
              </div>
            </div>
            <!-- / .notification -->
          </div>
        </div>
        <!--events end-->
        </div>
        </div>
      </div>
      </div>