<?php
class CookieHandler {
    public static function setCookie($name, $value, $expiration = null, $path = '/', $domain = '', $secure = false, $httponly = true) {
        if ($expiration === null) {
            $expiration = time() + (86400 * 30); // Tiempo de expiración por defecto: 30 días
        }
        
        setcookie($name, $value, $expiration, $path, $domain, $secure, $httponly);
    }
    
    public static function getCookie($name) {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }
        
        return null;
    }
    
    public static function deleteCookie($name, $path = '/', $domain = '') {
        setcookie($name, '', time() - 3600, $path, $domain);
        
        // Eliminar también la cookie de $_COOKIE
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
        }
    }
}

?>