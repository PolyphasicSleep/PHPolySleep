<?php

class siteSession
{
    public function startSession(){
        ini_set('session.use_strict_mode', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);

        if(!isset($_SESSION)){
            session_start();
        }

        if (!empty($_SESSION['deleted']) && $_SESSION['deleted'] < time() - 180) {
            session_destroy();
            session_start();
        }
    }


    public function destroySession(){
        session_unset();
        session_destroy();
    }
}