<?php
/**
 * Cross Site Request Forgery Class
 *
 */

/**
 * Instructions:
 *
 * At your form, before the submit button put:
 * <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
 *
 * This validation needed in the controller action method to validate CSRF token submitted with the form:
 *
 * if (!csrf::isTokenValid()) {
 *     LoginModel::logout();
 *     Redirect::home();
 *     exit();
 * }
 *
 * To get simpler code it might be better to put the logout, redirect, exit into an own (static) method.
 */
class csrf {
	/**
     * get CSRF token and generate a new one if expired
     *
     * @access public
     * @static static method
     * @return string
     */
    public static function makeToken()
    {
        if(isset($_SESSION['csrf_token'])) {
                return $_SESSION['csrf_token']; 
        } else {
                $token = hash('sha256', random_bytes(500));
                $_SESSION['csrf_token'] = $token;
                return $token;
        }
    }

    /**
     * checks if CSRF token in session is same as in the form submitted
     *
     * @access public
     * @static static method
     * @return bool
     */
    public static function isTokenValid()
    {
        $token = self::makeToken();
        return $token === $_POST['csrf_token'] && !empty($token);
    }
}