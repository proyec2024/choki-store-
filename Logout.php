<?php
require 'config/config.php';
session_destroy();
header('Location: ' . RUTA_PRINCIAL . '?pages=home');