<?php
// Verify User Login
function verify_test() {
    return true;
}

//function verify_user_login($account_model, $accessRegex = '/\d/', $initialize = TRUE) {
//    try {
//        if (get_cookie('accessToken')) {
//            $accountObj = $account_model->checkToken(get_cookie('accessToken'), $accessRegex);
//            if ($accountObj->first_login && $initialize) {
//                redirect('login/initialize');
//            }
//        } else {
//            throw new Exception("Please Login Again");
//        }
//    } catch ( exception $e ) {
//        set_cookie("getMessage", $e->getMessage(), time() + 3600 * 24);
//        if (get_cookie('accessToken')) {
//            delete_cookie('accessToken');
//        }
//        redirect('welcome/index');
//    }
//    return $accountObj;
//}
