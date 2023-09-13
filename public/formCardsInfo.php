<?php

    if (
        isset($_POST['type']) &&
        isset($_POST['owner']) &&
        isset($_POST['card_number']) &&
        isset($_POST['cvc']) &&
        isset($_POST['month_valid']) &&
        isset($_POST['year_valid'])
    ) {

        $creditcard = new CreditCard();
        $creditcard->create($_POST['type'], $_POST['owner'], $_POST['card_number']);
        

    }

?>