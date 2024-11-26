<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();
// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

header('Location: view/generate.php');

exit();
