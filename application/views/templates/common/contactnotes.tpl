<!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Contact Notes</h2>

            <a href="{$SITE_URL}crm/crmNotes/{$cntId}"><span class="btn center-block text-center"> Add Note </span></a>

            <div class="notifications-list">
{foreach $notelist as $t}
                    <div class="notification">
                        <div class="notification-description">{$t['cnotNote']}</div>
                        <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;{$t['cnotCreatedDate']|date_format:"%m/%d/%Y"}
                    </div>
                </div>

                <!-- / .notification -->

{/foreach}

            </div>
        </div>
        <!--events end-->



