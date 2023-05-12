            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>MiddleName</th>
                    <th>Salutation</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>JobTitle</th>
                    <th>DateOfBirth</th>
                    <th>StatusId</th>
                    <th>CreatedDate</th>
                    <th>CreatedBy</th>
                    <th>PrimaryEmail</th>
                    <th>PrimaryPhone</th>
                    <th>PrimaryAddress1</th>
                    <th>PrimaryAddress2</th>
                    <th>PrimaryState</th>
                    <th>PrimaryCity</th>
                    <th>PrimaryZip</th>
                    <th>Qualified</th>

                    <th>ParcelNumber</th>
                    <th>Company</th>
                    <th>Development</th>
                    <th>workorders</th>
                    <th>projects</th>

                    <th>primary category</th>
                    <th>AltContactName</th>
                    <th>OverHead</th>

                    <th>BillAddress</th>
                    <th>BillAddress</th>
                    <th>BillCity</th>
                    <th>BillState</th>
                    <th>BillZip</th>
                    <th>ShipAddress1</th>
                    <th>ShipAddress2</th>
                    <th>ShipCity</th>
                    <th>ShipState</th>
                    <th>ShipZip</th>
                    <th>Cell</th>
                    <th>Fax</th>
                    <th>Alt Email</th>

                </tr>
                </thead>
                <tbody>

                {foreach $data.rows as $d}
                    <tr>


                        <td>{$d.cntId}</td>
                        <td>{$d.cntFirstName}</td>
                        <td>{$d.cntLastName}</td>
                        <td>{$d.cntMiddleName}</td>
                        <td>{$d.cntSalutation}</td>
                        <td>{$d.cntGender}</td>
                        <td>{$d.cntDepartment}</td>
                        <td>{$d.cntJobTitle}</td>
                        <td>{$d.cntDateOfBirth|date_format:"%m-%d-%Y"}</td>
                        <td>{$d.cntCreatedDate|date_format:"%m-%d-%Y"}</td>
                        <td>{$d.cntCreatedBy}</td>
                        <td>{$d.cntPrimaryEmail}</td>
                        <td>{$d.cntPrimaryPhone}</td>
                        <td>{$d.cntPrimaryAddress1}</td>
                        <td>{$d.cntPrimaryAddress2}</td>
                        <td>{$d.cntPrimaryState}</td>
                        <td>{$d.cntPrimaryCity}</td>
                        <td>{$d.cntPrimaryZip}</td>
                        <td>{$d.cntQualified}</td>
                        <td>{$d.cntParcelNumber}</td>
                        <td>{$d.CompanyName} {$d.CompanyLastName}</td>
                        <td>{$d.DevelopmentName} {$d.DevelopmentLastName}</td>
                        <td>{$d.workorder_count}</td>
                        <td>{$d.project_count}</td>
                        <td>{$d.note_count}</td>
                        <td>{$d.primarycat}</td>
                        <td>{$d.cntAltContactName}</td>
                        <td>{$d.cntOverHead}</td>
                        <td>{$d.cntBillAddress1}</td>
                        <td>{$d.cntBillAddress2}</td>
                        <td>{$d.cntBillCity}</td>
                        <td>{$d.cntBillState}</td>
                        <td>{$d.cntBillZip}</td>
                        <td>{$d.cntShipAddress1}</td>
                        <td>{$d.cntShipAddress2}</td>
                        <td>{$d.cntShipCity}</td>
                        <td>{$d.cntShipState}</td>
                        <td>{$d.cntShipZip}</td>
                        <td>{$d.cntAltPhone1}</td>
                        <td>{$d.cntAltPhone2}</td>
                        <td>{$d.cntAltEmail}</td>

                </tr>
                {/foreach}
                </tbody>
            </table>
