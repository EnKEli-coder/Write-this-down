<?php

session_unset();

session_destroy();

header('Location:?menu=home');

?>