<?php

    session_start();
    session_unset();
    session_destroy();
    header("Location: /001CONGRATS/website/index.php?logout=succes");