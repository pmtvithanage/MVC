<?php
    session_start();

    function flash($name = '', $message = '', $class = 'msg-flash') {
        if (!empty($name)) {
            if (!empty($message) && empty($_SESSION[$name])) {
                //unsetting the previous message
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                
                if (!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }

                //setting the new message
                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            } elseif (empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            } 
        }
    }
?>