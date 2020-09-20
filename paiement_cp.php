<?php
//Credential
$apikey = '7724396325a61cf7bcf0f23.39853641';
$cpm_site_id = '525267';

//Post Parameters
$cpm_amount = 100; //Le montant de la transaction
$cpm_version = 'V1';
$cpm_language = 'fr';
$cpm_currency = 'CFA';
$cpm_page_action = 'PAYMENT';
$cpm_custom = 'PAIEMENTTEST';
$cpm_payment_config = 'SINGLE';
$cpm_designation = 'PAIEMENTTEST'; //Le produit acheter
$cpSecure = "https://secure.cinetpay.com";

$cpm_trans_date = date("Y-m-d H:i:s");
$cpm_trans_id = 'BELV-' . (string)date("YmdHis"); //J'ai ajouter 'Test-' pour eviter les duplication dans CP
$return_url = ""; //Le client sera rediriger vers cette url apres son paiement
$notify_url = "";
$cancel_url = "";
$signatureUrl = "https://api.cinetpay.com/v1/?method=getSignatureByPost";

//Data that will be send in the form
$getSignatureData = array(
    'apikey' => $apikey,
    'cpm_amount' => $cpm_amount,
    'cpm_custom' => $cpm_custom,
    'cpm_site_id' => $cpm_site_id,
    'cpm_version' => $cpm_version,
    'cpm_currency' => $cpm_currency,
    'cpm_trans_id' => $cpm_trans_id,
    'cpm_language' => $cpm_language,
    'cpm_trans_date' => $cpm_trans_date,
    'cpm_page_action' => $cpm_page_action,
    'cpm_designation' => $cpm_designation,
    'cpm_payment_config' => $cpm_payment_config
);
// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'method' => "POST",
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($getSignatureData)
    )
);

$context = stream_context_create($options);
$result = file_get_contents($signatureUrl, false, $context);
if ($result === false) {
    /* Handle error */
    \header($return_url);
    exit();
}


$signature = json_decode($result);
?>


<form action="<?php echo $cpSecure;?>" method="post">
    <input type="hidden" value="<?php echo $apikey; ?>" name="apikey">
    <input type="hidden" value="<?php echo $total_reel; ?>" name="cpm_amount">
    <input type="hidden" value="<?php echo $cpm_custom; ?>" name="cpm_custom">
    <input type="hidden" value="<?php echo $cpm_site_id; ?>" name="cpm_site_id">
    <input type="hidden" value="V1" name="cpm_version">
    <input type="hidden" value="CFA" name="cpm_currency">
    <input type="hidden" value="<?php echo $cpm_trans_id; ?>" name="cpm_trans_id">
    <input type="hidden" value="fr" name="cpm_language">
    <input type="hidden" value="<?php echo $getSignatureData['cpm_trans_date']; ?>" name="cpm_trans_date">
    <input type="hidden" value="PAYMENT" name="cpm_page_action">
    <input type="hidden" value="<?php echo $cpm_designation; ?>" name="cpm_designation">
    <input type="hidden" value="SINGLE" name="cpm_payment_config">
    <input type="hidden" value="<?php echo $signature; ?>" name="signature">
    <input type="hidden" value="<?php echo $return_url; ?>" name="return_url">
    <input type="hidden" value="<?php echo $cancel_url; ?>" name="cancel_url">
    <input type="hidden" value="<?php echo $notify_url; ?>" name="notify_url">
    <!-- <input type="hidden" value="1" name="debug"> -->
    <p><a href="#"><input type="submit" value="Payer" class="btn btn-primary py-3 px-4" name="add"></a></p>
</form>
<?php
