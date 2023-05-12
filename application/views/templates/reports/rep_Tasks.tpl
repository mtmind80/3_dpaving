
<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        td{
            font-family:Verdana; font-size:10px;
            vertical-align: top;
            text-align: left;
            color:#000;
        }
    </style>
    <title>3D Paving CRM Profile</title>
</head>

<body>
<H2>Tasks</h2>
</H2><table >
    <thead>
    <tr>
        <td >Date Due</td>
        <td >Task</td>
        <td >Created</td>
        <td style='width:10%;'>Mark Completed</td>
    </tr>
    </thead>
    <tbody>
    {assign var=odd value='odd gradeA'}
    {assign var=even value='even gradeA'}
    {IF $data}
    {foreach $data as $d}
        <tr class="{cycle values="$odd,$even"}">
            <td><span class="note-title">{$d.taskDueDate|date_format:"%A %B %d,  %Y"}</span></td>

            <td class="text-left">{$d.taskDescription}
                {IF $d.taskStatus}
                    <br/>Response:{$d.taskResponse}
                {/IF}
            </td>
            <td class="text-left">{$d.taskCreatedDateTime|date_format:"%A %B %d,  %Y"}
                <br/>{$d.Creator}
            </td>

            <td class="text-center">
                {IF !$d.taskStatus}
                <span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}tasks/completeTask/{$d.taskID}">Complete</a>
                    {ELSE}
                    Completed
                    {$d.taskCompletedDateTime|date_format:"%B %d,  %Y at %I:%M %p"}
                    {/IF}
            </td>
        </tr>
    {/foreach}

    {/IF}

    </tbody>
</table>
</body>
</html>
