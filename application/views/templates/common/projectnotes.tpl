<!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Project Notes</h2>

            <a href="{$SITE_URL}workorders/Notes/{$pid}"><span class="btn center-block text-center"> Add Note </span></a>

            <div class="notifications-list">
{foreach $pnotelist as $t}
                    <div class="notification">
                        <div class="notification-description">{$t['jnotNote']}</div>
                        <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;{$t['jnotCreatedDate']}
                    </div>
                </div>

                <!-- / .notification -->

{/foreach}

            </div>
        </div>
        <!--events end-->



