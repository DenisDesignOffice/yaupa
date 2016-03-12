<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ticket</title>

        <link rel="stylesheet" type="text/css" href="../../static/css/ticketcss.css"/>
        
        <link rel="shortcut icon" href="/static/images/favicon.ico">

    </head>

    <body>

        <i>Congratulations!</i> &nbsp; Please print or write down your ticket details.<br/>
        Note: All passengers are adviced to be at the terminal 30mins before departure time.

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
                    <td id="label">Time of Departure</td>  <td id="data">7.00 AM</td>
                </tr>

                <tr>
                    <td id="label">Destination</td>  <td id="data"><?php echo $_SESSION['to_state']; ?></td>
                </tr>

                <tr>
                    <td id="label">Park Address</td>  <td id="data"><?php echo $_SESSION['company_address']; ?></td>
                </tr>


            </table>

            <!--Display Contact Number Here For Complaints -->
            <br />
            For Complaints Please Call: 08137004275
        </div>

    </body>
</html>
