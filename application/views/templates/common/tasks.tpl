<!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Tasks</h2>
            <a href="{$SITE_URL}tasks/addTask/"><span class="btn center-block text-center"> Add Task </span></a>

            <div class="notifications-list">
{if $tasklist}

{foreach $tasklist as $t}
                    <div class="notification">
                        <div class="notification-description">{$t['taskDescription']}</div>
                        <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;<a href="{$SITE_URL}tasks/completeTask/{$t['taskID']}">Complete</a>
                    </div>
                </div>

                <!-- / .notification -->

{/foreach}
{/if}

            </div>
        </div>
        <!--events end-->



