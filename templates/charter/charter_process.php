<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>booking</title>
</head>

<body onload="document.submit_form.submit()">
<?php
	if(isset($_POST['button'])){
		if($_POST['radio'] == "classic room")
		{
		$amount = 48000;
		}
		else if($_POST['radio'] == "executive suite")
		{
		$amount = 56000;
		}
		else if($_POST['radio'] == "junior suite")
		{
		$amount = 70000;
		}
		else if($_POST['radio'] == "presidential suite")
		{
		$amount = 150000;
		}
		else{
		$amount = 0;
		}
	}
?>
<h1>Please wait...Redirecting...</h1>
<p>Click the proceed button if your browser fails to redirect</p>
<form name="submit_form" method="post" action="https://stageserv.interswitchng.com/test_paydirect/pay">
	<?php
		$generate_random_cust_id = mt_rand(111, 999);
		$generate_random_trans_ref = mt_rand(1111111111, 9999999999);
		$mac_key = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";
		$url = "http://localhost/yaupa.com/util/order_status.php";
		$product_id = "6205";
		$pay_item_id = "101";
		$amount = 300000;
        $_SESSION['amount'] = $amount;
        $_SESSION['trans_ref'] = $generate_random_trans_ref;
	?>
	
	

      <td colspan="4"><div align="center">
        <input name="product_id" type="hidden" value="<?php echo $product_id; ?>" />
        <input name="cust_id" type="hidden" value="<?php echo $generate_random_cust_id; ?>" />
        <input name="cust_name" type="hidden" value="Yaupa tickets" />
        <input name="pay_item_id" type="hidden" value="<?php echo $pay_item_id; ?>" />
        <input name="amount" type="hidden" value="<?php echo $amount; ?>" />
        <input name="currency" type="hidden" value="566" />
        <input name="site_redirect_url" type="hidden" value="<?php echo $url; ?>"/>
        <input name="txn_ref" type="hidden" value="<?php echo $generate_random_trans_ref; ?>" />
		<?php 
			$raw_value = $generate_random_trans_ref.$product_id.$pay_item_id.$amount.$url.$mac_key;
			$hash_value = hash('sha512', $raw_value);
		?>
        <input name="hash" type="hidden" value="<?php echo $hash_value; ?>" />
        <input type="submit" name="button" id="button" value="Proceed" />
      </div></td>
    </tr>
  </table>
</form>

</body>
</html>
