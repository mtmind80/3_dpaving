
<!-- monthlist -->
<h2>Company Events {$monthName}, {$year}</h2>

{IF $USER_ROLE eq 1}
<a class="topbut btn btn-success" href="{$SITE_URL}calendar/editcalendarCE/"><span class="btn-label icon fa fa-clock-o"></span> Add Event</a>
    <p>&nbsp;</p>

{/IF}
<table width="100%">
    <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendarCE/{$year - 1}/{$month}" title="Previous Year"><span class=" icon fa fa-caret-left"  style="font-size:2.5EM;"> </span></a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$JAN}" title ="Go to January, {$year}">JAN</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$FEB}" title ="Go to February, {$year}">FEB</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$MAR}" title ="Go to March, {$year}">MAR</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$APR}" title ="Go to Aptil, {$year}">APR</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$MAY}" title ="Go to May, {$year}">MAY</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$JUN}" title ="Go to June, {$year}">JUN</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$JUL}" title ="Go to July, {$year}">JUL</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$AUG}" title ="Go to August, {$year}">AUG</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$SEP}" title ="Go to September, {$year}">SEP</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$OCT}" title ="Go to October, {$year}">OCT</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$NOV}" title ="Go to November, {$year}">NOV</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarCE/{$year}/{$DEC}" title ="Go to December 1, {$year}">DEC</a></td>
    <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendarCE/{$year + 1}/{$month}" title="Next Year"><span class=" icon fa fa-caret-right"  style="font-size:2.5EM;"> </span></a></td>
</table>




                <table >
 <!--
                <thead>
                    <tr>
                        <th class="fc-widget-header">
                        all day    </th>
                        <th class="fc-widget-header">
                        agenda    </th>
                    </tr>
                </thead>

                event sof this month
                -->
                    <tbody>
                    {assign var="to" value = ''}
                    {foreach $data as $d}
                        <tr  style="border: 1px solid #d9edf7;">
                            <td class="agendatext2" ><h3>{$d.eventName}</h3>{$d.eventDescription}<br/>
                                <span class=" fa fa-clock-o"></span> &nbsp;{$d.eventDate|date_format:"%A %B %d,  %Y "} at {$d.eventTime}</td>
                        </tr>


                    {/foreach}

                    </tbody>
                </table>

