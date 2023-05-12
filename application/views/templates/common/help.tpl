<!--help Popup -->


        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top"  style="min-height:250px;vertical-align: top;">
            <div class="eventswrapper"  style="min-height:350px;vertical-align: top;">
            <div style='width:340px;
                        height:34px;
                        background: #f2f5f7;
                        font-size:2.2EM;
                        color:#0070a3;
                        text-align: center;'>
                <div class="notification-icon fa fa-question"></div>
                &nbsp;Help
            </div>
           <!-- Help Title -->
            <span style="font-size:1.2EM;">{$HELP_TITLE}</span>
                <div class="help-block">
                    <!-- Help Text -->
                    <div class="ui-helper-clearfix" >{$HELP_DESC}
                    </div>
                    {IF $HELP_URL != ''}
                    <div class="ui-helper-clearfix">
                        <div class="notification-icon fa fa-asterisk"></div>&nbsp;for more information <a href="{$HELP_URL}" target='help'>Click Here</a>
                    </div>
                    {/IF}
                </div>
            </div>
        <span class="btn center-block text-center"><a href='Javascript:self.close();'><div class="notification-icon fa fa-minus-circle"></div>&nbsp;Close Window</a></span>

        </div>
    </div>

