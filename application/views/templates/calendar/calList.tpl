{assign var="today" value = $dateRequested|date_format:"%A %B %d,  %Y "}
{assign var="cellclass" value="cal"}
{assign var="celldateclass" value="caldate"}
<!-- monthlist -->

<table width="800px">
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$JAN}" title ="Go to January 1, {$year}">JAN</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$FEB}" title ="Go to February 1, {$year}">FEB</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$MAR}" title ="Go to March 1, {$year}">MAR</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$APR}" title ="Go to Aptil 1, {$year}">APR</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$MAY}" title ="Go to May 1, {$year}">MAY</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$JUN}" title ="Go to June 1, {$year}">JUN</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$JUL}" title ="Go to July 1, {$year}">JUL</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$AUG}" title ="Go to August 1, {$year}">AUG</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$SEP}" title ="Go to September 1, {$year}">SEP</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$OCT}" title ="Go to October 1, {$year}">OCT</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$NOV}" title ="Go to November 1, {$year}">NOV</a></td>
    <td class="monthlist"><a href="{$SITE_URL}calendar/showcalendar/{$DEC}" title ="Go to December 1, {$year}">DEC</a></td>
</table>

<!-- day list -->
<table width="800px">
       <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendar/{$prevSunday}" title="Previous Week"><span class=" icon fa fa-caret-left"  style="font-size:2.5EM;"> </span></a></td>
    <td class="calmenutab">
           <table>
               <tr>

               <td class="{$cellclass}{IF intval($dateRequested) === intval($thisSunday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisSunday}">Sunday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisSunday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisSunday}">{$thisSunday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>
       <td class="calmenutab">
           <table>
               <tr>
               <td class="{$cellclass}{IF intval($dateRequested) === intval($thisMonday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisMonday}">Monday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisMonday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisMonday}">{$thisMonday|date_format:'%B %d' }</a></td>
               </tr>
           </table>


       </td>
    <td class="calmenutab">
           <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisTuesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisTuesday}">Tuesday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisTuesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisTuesday}">{$thisTuesday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td class="{$cellclass}{IF intval($dateRequested) === intval($thisWednesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisWednesday}">Wednesday</a></td>
               </tr>
               <tr>
               <td class="{$celldateclass}{IF intval($dateRequested) === intval($thisWednesday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisWednesday}">{$thisWednesday|date_format:'%B %d' }</a></td>
               </tr>
           </table>
       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisThursday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisThursday}">Thursday</a></td>
               </tr>
               <tr>
               <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisThursday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisThursday}">{$thisThursday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisFriday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisFriday}">Friday</a></td>
               </tr>
               <tr>
              <td  class="{$celldateclass}{IF intval($dateRequested) === intval($thisFriday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisFriday}">{$thisFriday|date_format:'%B %d' }</a></td>
               </tr>
           </table>

       </td>

    <td class="calmenutab">
        <table>
               <tr>
               <td  class="{$cellclass}{IF intval($dateRequested) === intval($thisSaturday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisSaturday}">Saturday</a></td>
               </tr>
               <tr>
               <td class="{$celldateclass}{IF intval($dateRequested) === intval($thisSaturday)}on{/IF}"><a href="{$SITE_URL}calendar/showcalendar/{$thisSaturday}">{$thisSaturday|date_format:'%B %d' }</a></td>
               </tr>
           </table>
       </td>
       <td class="calmenunav"><a href="{$SITE_URL}calendar/showcalendar/{$nextSunday}" title="Next Week"><span class=" icon fa fa-caret-right" style="font-size:2.5EM;"></span></a></td>

    </table>

</td>
</table>

<h2>{$today}</h2>

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
                -->
                    <tbody>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday" ><span>7am</span></td>
                        <td class="agendatext" >&nbsp;Morning Meeting </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>8am</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>9am</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>10am</span></td>
                        <td class="agendatext">&nbsp; Call my Friend</td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>11am</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>12pm</span></td>
                        <td class="agendatext">&nbsp; Company Picnic</td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>1pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>2pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>3pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>4pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>5pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>6pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>7pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>8pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>9pm</span></td>
                        <td class="agendatext">&nbsp; Time for Bed </td>
                    </tr>
                    <tr  style="border: 1px solid #d9edf7;">
                        <td class="agendaday"><span>10pm</span></td>
                        <td class="agendatext">&nbsp; </td>
                    </tr>
                </tbody>
                </table>

