<?php
session_start();
unset($_Session);
session_destroy();
header("Location: index.php");