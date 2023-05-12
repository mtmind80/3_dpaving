            <table>
                <thead>
                <tr>
                    <th>Salutation</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>MI</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>

                {foreach $data.rows as $d}
                    <tr>
                    <td>{$d.cntSalutation}</td>
                        <td>{$d.cntFirstName}</td>
                        <td>{$d.cntLastName}</td>
                        <td>{$d.cntMiddleName}</td>
                        <td>{$d.CompanyName}</td>
                        <td>{$d.cntPrimaryPhone}</td>
                        <td>{$d.cntPrimaryAddress1}</td>
                        <td>{$d.cntPrimaryAddress2}</td>
                        <td>{$d.cntPrimaryCity}</td>
                        <td>{$d.cntPrimaryState}</td>
                        <td>{$d.cntPrimaryZip}</td>
                        <td>{$d.cntPrimaryEmail}</td>
                </tr>
                {/foreach}
                </tbody>
            </table>
