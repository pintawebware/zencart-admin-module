<?php
//require('includes/application_top.php');


if ($_REQUEST['main_page'] == 'checkout_success'){

   (sendNotifications());
}
function sendNotifications()
{
    global $db;
    $order_query = "SELECT orders_id as order_id, 
                    order_total as total,
                    currency as currency_code  
                    FROM orders WHERE orders_id=(SELECT MAX(orders_id) FROM orders)";



    $order = mysqli_fetch_assoc(mysqli_query($db->link, $order_query));

    $devices_query = "SELECT * FROM user_device_mob_api";

    $devices_list =(mysqli_query($db->link, $devices_query));

    $devices = array();

    while($row = $devices_list->fetch_assoc()){
        array_push($devices, $row);
    }
    $ids = [];
    foreach($devices as $device){
        if(strtolower($device['os_type']) == 'ios'){
            $ids['ios'][] = $device['token'];
        }else{
            $ids['android'][] = $device['token'];
        }
    }
    $order_id = $order['order_id'];


    if(count($order)>0) {

        $msg = array(
            'body'       => number_format( $order['total'], 2, '.', '' ),
            'title'      => "http://" . $_SERVER['HTTP_HOST'],
            'vibrate'    => 1,
            'sound'      => 1,
            'priority'   => 'high',
            'new_order'  => [
                'order_id'      => $order_id,
                'total'         => number_format( $order['total'], 2, '.', '' ),
                'currency_code' => $order['currency'],
                'site_url'      => "http://" . $_SERVER['HTTP_HOST'],
            ],
            'event_type' => 'new_order'
        );
        $msg_android = array(

            'new_order'  => [
                'order_id'      => $order_id,
                'total'         => number_format( $order['total'], 2, '.', '' ),
                'currency_code' => $order['currency'],
                'site_url'      => "http://" . $_SERVER['HTTP_HOST'],
            ],
            'event_type' => 'new_order'
        );

        foreach ( $ids as $k => $mas ):
            if ( $k == 'ios' ) {
                $fields = array
                (
                    'registration_ids' => $ids[$k],
                    'notification'     => $msg,
                );
            } else {
                $fields = array
                (
                    'registration_ids' => $ids[$k],
                    'data'             => $msg_android
                );
            }

            sendCurl( $fields );

        endforeach;

    }

}

function sendCurl($fields){
    $API_ACCESS_KEY = 'AAAAlhKCZ7w:APA91bFe6-ynbVuP4ll3XBkdjar_qlW5uSwkT5olDc02HlcsEzCyGCIfqxS9JMPj7QeKPxHXAtgjTY89Pv1vlu7sgtNSWzAFdStA22Ph5uRKIjSLs5z98Y-Z2TCBN3gl2RLPDURtcepk';
    $headers = array
    (
        'Authorization: key=' . $API_ACCESS_KEY,
        'Content-Type: application/json'
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    curl_exec($ch);
    curl_close($ch);

}



