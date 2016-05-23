<?PHP

include_once "../../util/connection.php";
$results = array();

if (isset($_GET['user']) == 'yaupa_client') {

    /* soak in the passed variable or set our own */
    $from = strtolower(htmlspecialchars($_GET['from']));
    $to = strtolower(htmlspecialchars($_GET['to']));
    $format = strtolower(htmlspecialchars($_GET['format']));

    /* grab the posts from the db */
    $result = mysql_query("SELECT * FROM travel_services, terminals WHERE from_state='$from'  AND to_state='$to' ");

    /* create one master array of the records */

    if (mysql_num_rows($result)) {
        while ($r = mysql_fetch_assoc($result)) {
            $results[] = $r;
        }
    }

    /* output in necessary format */
    if ($format == 'json') {
        header('Content-type: application/json');
        echo json_encode(array('response' => '200', 'status' => 'SUCCESSFUL', 'results' => $results));
    } else {
        echo json_encode(array('results' => $results));
    }
} else {
    echo json_encode(array('response' => "511", 'status' => "AUTHENTICATION_REQUIRED", "results" => $results));
}
?>
