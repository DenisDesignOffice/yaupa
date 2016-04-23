<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ticket</title>

        <link rel="stylesheet" type="text/css" href="../../static/css/ticketcss.css"/>
        <link rel="shortcut icon" href="/static/images/favicon.ico">

    </head>

    <body>

        <div class="trans_success"><i>Congratulations!</i> Please print or write down your ticket details.</div>


            <div class="trans_failure">Sorry! Your transaction was not successful. Please try again</div>
        </p>
        
        <div>

            <!--Display Company Name Here -->
            <h1>KING KOKO EXPRESS</h1>

            <table>

                <tr>
                    <td id="label">Name</td>  <td id="data"><?php echo $_SESSION['lastname'] .  ' ' .$_SESSION['firstname'] ; ?></td>
                </tr>


                <tr>
                    <td id="label">Ticket No</td>   <td id="data"><?php echo $_SESSION['pin']; ?></td>
                </tr>

                <tr>
                    <td id="label">Ref ID</td>  <td id="data"><?php echo $_SESSION['trans_ref']; ?></td>
                </tr>

                <tr>
                    <td id="label">Date</td> <td id="data"><?php echo $_SESSION['date']; ?></td>
                </tr>

                <tr>
                    <td id="label">Time of Departure</td>  <td id="data"><?php echo $_SESSION['departure']; ?></td>
                </tr>

                <tr>
                    <td id="label">Destination</td>  <td id="data"><?php echo $_SESSION['to_state']; ?></td>
                </tr>

                <tr>
                    <td id="label">Park Address</td>  <td id="data"><?php echo $_SESSION['address']; ?></td>
                </tr>


            </table>

            <!--Display Contact Number Here For Complaints -->
            
            <br class="footer"> Note: You are adviced to be at the terminal 30mins before departure time.<br/>
            For Complaints Call:+234 7035 277 717<br />
            
        </div>

    </body>
</html>
