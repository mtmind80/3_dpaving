<!--help -->

    <div class="stat-cell" style='vertical-align: top;'>
        <div class="eventswrapper"  style="min-height:230px;vertical-align: top;">
            <div class="notification-icon fa fa-question" style='width:230px;
                        height:34px;
                        background: #f2f5f7;
                        font-size:2.2EM;
                        color:#0070a3;
                        text-align: center;'>&nbsp; Help</div>

            <div class="notifications-list">

                <!-- Help Title -->
                <span style="font-size:1.2EM;">{$HELP_TITLE}</span>
                <div class="help-block">
                    <!-- Help Text -->
                    <div class="ui-helper-clearfix" >{$HELP_DESC}
                    </div>
                </div>
                {IF $HELP_URL != ''}

                <div class="notification">
                         <div class="notification-icon fa fa-asterisk"></div>&nbsp;for more information <a href="{$HELP_URL}" target='help'>Click Here</a>

                </div>
                {/IF}

                <span class="btn center-block text-center"><a href='Javascript:self.close();'><div class="notification-icon fa fa-minus-circle"></div>&nbsp;Close Window</a></span>

            </div>
        </div>
        <!--help end-->

    </div>

