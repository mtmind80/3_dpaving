            <table>
                <thead>
                <tr>
                    <th>Proposal ID</th>
                    <th>Name</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>Primary Contact</th>
                    <th>Primary Email</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Zip</th>
                    <th>Status</th>
                    <th>Approved Date</th>
                    <th>Approved</th>
                    <th>Rejected Date</th>
                    <th>Rejected Reason</th>
                    <th>Created DateTime</th>
                    <th>Client</th>
                    <th>Created By</th>
                    <th>Sales Person</th>
                    <th>Sales Manager</th>
                    <th>AlertNote</th>
                    <th>Cost</th>
                    <th>Services </th>


                </tr>
                </thead>
                <tbody>

                {foreach $data as $p}
                    <tr>

                        <td>{$p.jobID}</td>
                        <td>{$p.jobName}</td>
                        <td>{$p.jobAddress1}</td>
                        <td>{$p.jobAddress2}</td>
                        <td>{$p.jobPrimaryContact}</td>
                        <td>{$p.jobPrimaryEmail}</td>
                        <td>{$p.jobState}</td>
                        <td>{$p.jobCity}</td>
                        <td>{$p.jobZip}</td>
                        <td>{$p.ordStatus}</td>
                        <td>{$p.jobApprovedDate}</td>
                        <td>{$p.jobApproved}</td>
                        <td>{$p.jobRejectedDate}</td>
                        <td>{$p.jobRejectedReason}</td>
                        <td>{$p.jobCreatedDateTime}</td>
                        <td>{$p.clientfirst} {$p.clientlast}</td>
                        <td>{$p.cntFirstName} {$p.cntLastName}</td>
                        <td>{$p.salesfirst} {$p.saleslast}</td>
                        <td>{$p.managerfirst} {$p.managerlast}</td>
                        <td>{$p.jobAlertNote}</td>
                        <td>{$p.totalcost}</td>
                        <td>{$p.services}</td>

                </tr>
                {/foreach}
                </tbody>
            </table>
