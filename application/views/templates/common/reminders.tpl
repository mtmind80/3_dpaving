
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Reminders</h2>
            <div class="notifications-list">
{if $crmreminders}

{foreach $crmreminders as $d}

                <div class="notification">
                    <div class="notification-description"><span class=" fa fa-clock-o"></span>&nbsp;{$d.cnotReminderDate|date_format:"%A %B %d"}</div>
                    <div class="notification-description">{$d.cntFirstName} {$d.cntLastName}</div>
                    <div class="notification-description">{$d.cnotNote}</div>
                </div>
                <!-- / .notification -->
{/foreach}
{/if}            </div>

        </div>
        <!--reminders end-->



