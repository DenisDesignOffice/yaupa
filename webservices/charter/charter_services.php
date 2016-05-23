<?PHP
include_once "../../util/connection.php";
$results = array();

if (isset($_GET['user']) == 'yaupa_client' ) {

    /* soak in the passed variable or set our own */
    $vehicle_type = strtolower(htmlspecialchars($_GET['vehicle_type']));
    $from_state = strtolower(htmlspecialchars($_GET['from_state']));
//    $to_state = strtolower(htmlspecialchars($_GET['to_state']));
//    $to = strtolower(htmlspecialchars($_GET['to']));
//    $from = strtolower(htmlspecialchars($_GET['from']));
    $format = strtolower(htmlspecialchars($_GET['format']));

    /* grab the posts from the db */
    $result = mysql_query("SELECT * FROM charter_services, terminals"
            . " WHERE vehicle_type='$vehicle_type' AND from_state='$from_state' AND service_provider=tag ");
    
     /* create one master array of the records */
    
    if (mysql_num_rows($result)) {
        while ($r = mysql_fetch_assoc($result)) {
            $results[] = $r;
        }
    }

    /* output in necessary format */
    if ($format == 'json') {
        header('Content-type: application/json');
        echo json_encode(array('response'=>'200', 'status'=>'SUCCESSFUL', 'results' => $results));
    } 
    else {
        echo json_encode(array('results' => $results));
    }

}else{
    echo json_encode(array('response' => "511", 'status' => "AUTHENTICATION_REQUIRED", "results" => $results));
}

?>
