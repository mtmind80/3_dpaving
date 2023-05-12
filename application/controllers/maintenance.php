<?php
if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Maintenance extends EX_Controller
{
    public function updateFromRepo()
    {
        exec(ROOT_PATH . './update-allpaving ' . $this->USER_ID, $result);

        $logs = array();
        $patterns = array(
            '/^A\s+/i',
            '/^U\s+/i',
            '/^D\s+/i',
        );
        $replacements = array(
            '<span class="log added">Added:</span> ',
            '<span class="log updated">Updated:</span> ',
            '<span class="log deleted">Deleted:</span> ',
        );
        for ($i = 4; $i < count($result)-1; $i++) {
            if (strpos($result[$i], 'Restored') === false) {
                $logs[] = preg_replace($patterns, $replacements, $result[$i]);
            }
        }
        if (!empty($logs)) {
            $lastItem = explode(' ', $result[$i]);
            $revision = $lastItem[count($lastItem)-1];
            $logs[] = 'Site updated at revision #' . $revision;
        }
        $this->smarty->assign('LOGS', $logs);
	
        $this->smarty->assignContentTemplate('update-from-repo');
        $this->smarty->view();
    }
    
    public function contactNoteRemainder()
    {
	$remainders = 0;
    $rows = $this->M_System->getCRMReminders();
	if (count($rows)) {
	    
	    $subject = "CRM notification";
	    foreach ($rows as $row) {
            if (!empty($row['contactEmail']) && !empty($row['cnotNote'])) {

                $message = $row['contactFullName'] ."\r\n";
                $message .= $row['cnotNote'] . "\r\n";
                $d = new DateTime($row['cnotReminderDate']);
                $message .= $d->format("M d, Y") . "\r\n";

                mail($row['contactEmail'], $subject, wordwrap($message, 70, "\r\n"));
                $remainders++;
                $this->M_System->resetCRMnote($row['cnotId']);

            }
	    }
        echo $remainders .' sent<p>';

	}
	
	/*
	$subject = "Automated CRM notifications";
	$message = "Date: " . date("M d, Y - H:m") ."\r\n";
	$message .= "Remainders sent: " . $remainders ."\r\n";
	mail('herbtrevathan@gmail.com', $subject, wordwrap($message, 70, "\r\n"));
	*/

//send project noteifications

	$remainders = 0;
    $rows = $this->M_System->getProposalReminders();

        if (count($rows)) {

        $subject = "Proposal notification";
        foreach ($rows as $row) {
            if (!empty($row['contactEmail']) && !empty($row['jnotNote'])) {

                $message = $row['contactFullName'] ."\r\n";
                $message .= $row['jnotNote'] . "\r\n";
                $d = new DateTime($row['jnotReminderDate']);
                $message .= $d->format("M d, Y") . "\r\n";
                mail($row['contactEmail'], $subject, wordwrap($message, 70, "\r\n"));
                $this->M_System->resetPOnote($row['jnotId']);
                $remainders++;

            }
        }
            echo $remainders .' sent';
    }


    }


    public function contactNoteReminder()
    {
        $remainders = 0;
        $items = array(
            'tableName' => 'crmTblContactNotes',
            'join' => 'JOIN crmTblContacts ON crmTblContacts.cntId = crmTblContactNotes.cnotCreatedby',
            'fields' => array(
                'CONCAT(cntFirstName, " ", cntLastName) AS contactFullName',
                'cntPrimaryEmail AS contactEmail',
                'cnotCreatedby',
                'cnotId',
                'cnotNote',
                'cnotReminderDate',
            ),
            'where' => '(cnotReminder = 1 AND cnotReminderSent = 0 AND cnotReminderDate <= CURDATE())',
        );
        if ( (false !== ($rows = $this->dbpdo->get($items))) && (count($rows)) ) {

            echo count($rows);

            $subject = "CRM notification";
            foreach ($rows as $row) {
                if (!empty($row['contactEmail']) && !empty($row['cnotNote'])) {

                    $message = $row['contactFullName'] ."\r\n";
                    $message .= $row['cnotNote'] . "\r\n";
                    $d = new DateTime($row['cnotReminderDate']);
                    $message .= $d->format("M d, Y") . "\r\n";

                    mail($row['contactEmail'], $subject, wordwrap($message, 70, "\r\n"));
                    echo "send mail";

                    $items = array(
                        'tableName' => 'crmTblContactNotes',
                        'where' => 'cnotId = :ID',
                        'params' => array(
                            'ID' => $row['cnotId'],
                        ),
                        'data' => array(
                            'cnotReminderSent' => 1,
                        ),
                    );
                    $this->dbpdo->update($items);
                    $remainders++;
                }
            }
        }

        /*
        $subject = "Automated CRM notifications";
        $message = "Date: " . date("M d, Y - H:m") ."\r\n";
        $message .= "Remainders sent: " . $remainders ."\r\n";
        mail('herbtrevathan@gmail.com', $subject, wordwrap($message, 70, "\r\n"));
        */

//send project noteifications

        $remainders = 0;
        $items = array(
            'tableName' => 'POTblJobOrderNotes',
            'join' => 'JOIN crmTblContacts ON crmTblContacts.cntId = POTblJobOrderNotes.jnotCreatedBy',
            'fields' => array(
                'CONCAT(cntFirstName, " ", cntLastName) AS contactFullName',
                'cntPrimaryEmail AS contactEmail',
                'jnotCreatedBy',
                'jnotNote',
                'jnotId',
                'jnotReminderDate',
            ),
            'where' => '(jnotReminder = 1 AND jnotReminderSent = 0 AND jnotReminderDate <= CURDATE())',
        );
        if ( (false !== ($rows = $this->dbpdo->get($items))) && (count($rows)) ) {
            $subject = "Proposal notification";
            foreach ($rows as $row) {
                if (!empty($row['contactEmail']) && !empty($row['jnotNote'])) {

                    $message = $row['contactFullName'] ."\r\n";
                    $message .= $row['jnotNote'] . "\r\n";
                    $d = new DateTime($row['jnotReminderDate']);
                    $message .= $d->format("M d, Y") . "\r\n";

                    mail($row['contactEmail'], $subject, wordwrap($message, 70, "\r\n"));
                    echo "send mail";

                    $items = array(
                        'tableName' => 'POTblJobOrderNotes',
                        'where' => 'jnotId = :ID',
                        'params' => array(
                            'ID' => $row['jnotId'],
                        ),
                        'data' => array(
                            'cnotReminderSent' => 1,
                        ),
                    );
                    $this->dbpdo->update($items);
                    $remainders++;
                }
            }
        }
        echo $rows;

        echo "all done";

    }

}
