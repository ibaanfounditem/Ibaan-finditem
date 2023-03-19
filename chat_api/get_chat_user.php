<?php
    header("Access-Control-Allow-Origin: *");

    session_start();

    include '../connect_db.php';
    
    $recipient_id = $_POST['recipient_id'];
    $accountId=$_SESSION['accountId'];
    $xmsg= $conn->query("SELECT * FROM (Select t1.*,admin_name recipient_name from vwchat t1 INNER JOIN tb_admin t2 ON t2.admin_id=$recipient_id WHERE t1.recipient =$accountId and sender_id = $recipient_id UNION ALL Select t1.*,admin_name from vwchatusers t1 INNER JOIN tb_admin t2 ON t2.admin_id=$recipient_id WHERE t1.recipient =$recipient_id and t1.sender_id = $accountId) as tbl1 Order BY datesent ");
    if($xmsg->num_rows > 0){
        $rows = array();
        $xcount = 0;
        while($message= $xmsg->fetch_assoc()){
        $xcount++;
            // $rows['count'][] = $xcount;
            // $rows['textmessage'][] = $message['textmessage'];
            $rows[] = $message;
        }

        echo json_encode($rows);
    }
    else{
        echo json_encode(array('count' => 0,
                            'textmessage'=> 'no message'
                                    ));
    }
?>