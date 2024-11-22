<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();
// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;
// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 5;
$max = $_GET['max'] ?? 20;
// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;
// ユーザーの生成
$restaurantChain = RandomGenerator::restaurantChains($min, $max);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>User Profiles</title>
</head>

<body>
  <div class="vh-100 bg-white pt-30">
    <?php foreach ($restaurantChain as $chain): ?>
      <div class="justify-content-center">
        <h1 class="text-center">Restaurant Chain <?php echo $chain->getName() ?></h1>
        <div class="p-5">
          <div class="border-line bg-gray rounded-md">
            <h4 class="pl-20">Restaurant Chain information</h4>
            <div>
              <div class="border-line bg-white p-10">
                <div class="d-flex flex-column flex-gap-4">
                  <?php foreach ($chain->getRestaurantLocations() as $location): ?>
                    <div class="accordion">
                      <div class="justify-content-between d-flex p-10 bg-blue text-blue accordion-header">
                        <h5 class="bg-blue text-blue m-0"><?php echo $location->getName() ?></h5>
                        <div class="flex-between font-20  triangle"> ＞ </div>
                      </div>
                      <div class="pt-0 accordion-content">
                        <p class="pl-20 pt-0 border-none mt-10"><?php echo $location->shortIntroduction() ?></p>
                        <h4 class="pl-20 border-none mt-10 mb-10">Employee:</h4>
                        <?php foreach ($location->getEmployees() as $employee): ?>
                          <p class="employee border-line m-0 p-10 pl-20"><?php echo $employee->toString() ?></p>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>

        <!-- javascriptの呼び出し -->
        <script src="js/script.js"></script>

</body>

</html>