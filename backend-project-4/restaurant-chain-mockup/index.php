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

<body class="bg-white">

  <div class="vh-100">
    <div class="flex flex-col gap-40 mx-128 my-64">
      <?php foreach ($restaurantChain as $chain): ?>
        <div class="flex flex-col gap-20">
          <h2 class="self-center text-4xl">Restaurant Chain <?php echo $chain->getName() ?></h2>
          <div class="w-100 flex flex-col border rounded">
            <h4 class="w-100 py-8 px-16 bg-grey text-base text-grey border-bottom">Restaurant Chain Information</h4>
            <div class="p-16">
              <?php foreach ($chain->getRestaurantLocations() as $location): ?>
                <div class="accordion">
                  <h4 class="w-100 bg-blue font-semibold text-base text-blue border-bottom p-12 px-18 accordion-header"><?php echo $location->getName() ?></h4>
                  <div class="accordion-content">
                    <h4 class="w-100 text-base"><?php echo $location->shortIntroduction() ?></h4>
                    <div class="border-bottom"></div>
                    <div class="flex flex-col gap-6">
                      <h4 class="text-xl">Employees:</h4>
                      <div class="border rounded">
                        <?php foreach ($location->getEmployees() as $employee): ?>
                          <div class="py-8 px-16">
                            <h4 class="font-base text-base text-grey"><?php echo $employee->toString() ?></h4>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- javascriptの呼び出し -->
  <script src="js/script.js"></script>

</body>

</html>