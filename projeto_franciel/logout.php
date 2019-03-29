<?php
require'./db/config.php';
session_start();
session_destroy();

header("Location:index.php");