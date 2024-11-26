<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href='../css/style.css' />
  <title>Generate Restaurant Chains</title>
</head>

<body class="bg-white">
  <div class="vh-100 grid grid-rows-header">
    <section class="flex justify-between">
      <h1 class="text-4xl self-center">Randome Restaurant Chain Generator</h1>
      <p class="text-base self-center">Recursion</p>
    </section>
    <section class="mx-18 grid grid-columns-sidebar gap-18">
      <div class="p-18 flex flex-col gap-6">
        <h2 class="text-2xl">使用方法</h2>
        <ol class="flex flex-col gap-6">
          <li class="text-base">作成したいmockのパラメータを設定</li>
          <li class="text-base">生成したいformatを選択</li>
          <li class="text-base">「Generate」ボタンをクリック&#33;</li>
        </ol>
      </div>
      <div class="flex flex-col border-2 rounded-md">
        <form action="downloal.php" method="post" class="flex flex-col gap-40 self-center my-auto">

          <!-- total users -->
          <div class="flex flex-col gap-4">
            <label for="users">1. 会社が持っている、レストランブランドの数を入力: </label>
            <input type="number" id="numberOfChains" name="numberOfChains" min="1" max="100" value="2" required>
          </div>


          <!-- employees of chain  -->
          <div class="flex flex-col gap-4">
            <label for="employees">2. 従業員数を入力: </label>
            <input type="number" id="numberOfEmployees" name="numberOfEmployees" min="1" max="100" value="2" required>
          </div>


          <!-- range of employee's salary -->
          <div class="flex flex-col gap-12">
            <div class="flex flex-col gap-4">
              <label for="salary">3. 従業員の給料の幅を入力</label>
            </div>

            <div class="flex justify-between">
              <label class="pl-20" for="minSalary">最低賃金: </label>
              <input class="" type="number" id="minSalary" name="minSalary" min="1" max="9999" value="1" required>
              <label class="pl-20" for="maxSalary">最大賃金: </label>
              <input type="number" id="maxSalary" name="maxSalary" min="1" max="9999" value="10" required>
            </div>
          </div>


          <!-- total locations -->
          <div class="">
            <label for="locations">4. レストランチェーンが何店舗あるかを入力: </label>
            <input type="number" id="numberOfLocations" name="numberOfLocations" min="1" max="10" value="2" required>
          </div>

          <!-- file format select -->
          <div class="">
            <label for="format">最後に、出力フォーマットを選択してください: </label>
            <select name="format">
              <option value="html">HTML</option>
              <option value="md">Markdown</option>
              <option value="json">JSON</option>
              <option value="txt">Text</option>
            </select>
          </div>

          <div class="flex justify-center">
            <button class="bg-black text-white p-8 text-base" type="submit">Generate</button>
          </div>
        </form>
      </div>
    </section>
  </div>
</body>

</html>