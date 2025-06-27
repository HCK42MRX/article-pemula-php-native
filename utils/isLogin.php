<?php

function isLogin()
{
    return !empty($_SESSION["isLogin"]) && $_SESSION["isLogin"] === true;
}
