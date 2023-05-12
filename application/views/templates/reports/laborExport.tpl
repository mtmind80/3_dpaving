{assign var="td" value=0}
<table><td>{$searchStart}</td> <td>{$searchEnd}</td></table>
{IF $searchtype eq 0}
 <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Hours</th>

                </tr>
                </thead>
                <tbody>

                {foreach $data as $p}
                    <tr>

                        <td>{$p.cntFirstName} {$p.cntLastName}</td>
                        <td>  {$td = $td + $p.diff}
                            {$p.diff/3600}</td>
                </tr>
                {/foreach}
                <tr>

                    <td>Total</td>
                    <td>{$td/3600}</td>
                </tr>

                </tbody>
            </table>
{ELSE}
    <table>
        <thead>
        <tr>
            <th>Employee</th>
            <th>Work Order</th>
            <th>Job</th>
            <th>Date</th>
            <th>Hours</th>

        </tr>
        </thead>
        <tbody>

        {foreach $data as $p}
            <tr>
                <td>{$p.cntFirstName} {$p.cntLastName}</td>
                <td>{$p.jobMasterYear}-{$p.jobMasterMonth}-{"%05d"|sprintf:$p.jobMasterNumber}<br/>
                    {$p.jobName}
                </td>

                <td>{$p.jordName}</td>

                <td>{$p.POlaborDate|date_format:"%m/%d/%Y"}</td>

                <td>{$p.diff/3600}</td>
            </tr>
            {$td = $td + $p.diff}

        {/foreach}
        <tr>

            <td>Total</td>
            <td>{$td/3600}</td>
        </tr>

        </tbody>
    </table>
 {/IF}
