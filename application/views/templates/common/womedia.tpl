<!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Work Order Media</h2>

            <a href="{$SITE_URL}workorders/WOMedia/{$pid}"><span class="btn center-block text-center"> Add Media </span></a>

            <div class="notifications-list">
{foreach $pmedia as $t}
                    <div class="notification">
                        <div class="notification-description">
                            <div class="notification-icon fa fa-circle"></div>&nbsp;
                            <a href="{$SITE_URL}media/projects/{$t.jobmdFileName }" target='doc' title='View Document'>{$t['PODocTypeName']}</a>
                        </div>
                        <div class="notification-description">
                            {IF $t['jordName'] neq ''}{$t['jordName']}<br/>{/IF}
                            {$t['jobmdDescription']}
                            <br />
                            Uploaded on:{$t['jobmdCreatedDateTime']|date_format:"%m/%d/%Y"}
                        </div>
                <!-- / .notification -->
                    </div>
{/foreach}

            </div>
        </div>
        <!--events end-->



