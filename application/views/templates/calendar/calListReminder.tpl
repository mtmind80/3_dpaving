{assign var="today" value = $dateRequested|date_format:"%A %B %d,  %Y "}
{assign var="from" value = $thisSunday|date_format:"%A %B %d,  %Y "}
{assign var="to" value = $thisSaturday|date_format:"%A %B %d,  %Y "}
{assign var="cellclass" value="cal"}
{assign var="celldateclass" value="caldate"}
<!-- monthlist -->
<H2>My Reminders</H2>
<table width="800px">
    <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendarReminder/{$LASTYEAR}" title="Previous Year"><span class=" icon fa fa-caret-left"  style="font-size:2.5EM;"> </span></a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$JAN}" title ="Go to January 1, {$year}">JAN</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$FEB}" title ="Go to February 1, {$year}">FEB</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$MAR}" title ="Go to March 1, {$year}">MAR</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$APR}" title ="Go to Aptil 1, {$year}">APR</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$MAY}" title ="Go to May 1, {$year}">MAY</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$JUN}" title ="Go to June 1, {$year}">JUN</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$JUL}" title ="Go to July 1, {$year}">JUL</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$AUG}" title ="Go to August 1, {$year}">AUG</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$SEP}" title ="Go to September 1, {$year}">SEP</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$OCT}" title ="Go to October 1, {$year}">OCT</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$NOV}" title ="Go to November 1, {$year}">NOV</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendarReminder/{$DEC}" title ="Go to December 1, {$year}">DEC</a></td>
    <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendarReminder/{$NEXTYEAR}" title="Next Year"><span class=" icon fa fa-caret-right" style="font-size:2.5EM;"></span></a></td>
</table>

<!-- day list
<table width="800px">
       <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendarReminder/{$prevSunday}" title="Previous Week"><span class=" icon fa fa-caret-left"  style="font-size:2.5EM;"> </span></a></td>
    <td class="calmenutab">
           <table>
               <tr>

               <td class="{$cellclass}{IF intval($dateRequested) === intval($thisSunday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisSunday}">Sunday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisSunday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisSunday}">{$thisSunday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>
       <td class="calmenutab">
           <table>
               <tr>
               <td class="{$cellclass}{IF intval($dateRequested) === intval($thisMonday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisMonday}">Monday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisMonday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisMonday}">{$thisMonday|date_format:'%B %d' }</a></td>
               </tr>
           </table>


       </td>
    <td class="calmenutab">
           <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisTuesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisTuesday}">Tuesday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisTuesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisTuesday}">{$thisTuesday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td class="{$cellclass}{IF intval($dateRequested) === intval($thisWednesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisWednesday}">Wednesday</a></td>
               </tr>
               <tr>
               <td class="{$celldateclass}{IF intval($dateRequested) === intval($thisWednesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisWednesday}">{$thisWednesday|date_format:'%B %d' }</a></td>
               </tr>
           </table>
       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisThursday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisThursday}">Thursday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisThursday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisThursday}">{$thisThursday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisFriday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisFriday}">Friday</a></td>
               </tr>
               <tr>
              <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisFriday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisFriday}">{$thisFriday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisSaturday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisSaturday}">Saturday</a></td>
               </tr>
               <tr>
               <td class="{$celldateclass}{IF intval($dateRequested) === intval($thisSaturday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendarReminder/{$thisSaturday}">{$thisSaturday|date_format:'%B %d' }</a></td>
               </tr>
           </table>
       </td>
       <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendarReminder/{$nextSunday}" title="Next Week"><span class=" icon fa fa-caret-right" style="font-size:2.5EM;"></span></a></td>

    </table>

</td>
</table>
-->

<h3>{$thismonth}  {$year}</h3>

                <table >
<!--
                <thead>
                    <tr>
                        <th class="fc-widget-header">
                        date    </th>
                        <th class="fc-widget-header">
                        Client    </th>
                        <th class="fc-widget-header">
                       Reminder    </th>
                    </tr>
                </thead>
                    -->
                    <tbody>
                    {foreach $data as $d}

                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendatext" style="width:200px;">{$d.cnotReminderDate|date_format:"%A %B %d"}</td>
                        <td class="agendatext" style="width:200px;" ><span>{$d.cntFirstName} {$d.cntLastName}</span></td>
                        <td class="agendatext" >&nbsp;{$d.cnotNote}</td>
                    </tr>
                    {/foreach}
                </tbody>
                </table>

