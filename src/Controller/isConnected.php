<?php

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $isConnected = true;
}
else {
    $isConnected = false;
}