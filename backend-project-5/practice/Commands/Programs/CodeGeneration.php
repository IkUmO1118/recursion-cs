<?php

namespace Commands\Programs;

use Commands\AbstractCommand;

class CodeGeneration extends AbstractCommand
{
  // 使用するコマンド名を設定
  protected static ?string $alias = 'code-gen';
  protected static bool $requiredCommandValue = true;

  // 引数を割り当て
  // 引数を割り当て
  public static function getArguments(): array
  {
    return [];
  }

  public function execute(): int
  {
    $commandName = $this->getCommandValue();

    if (!$commandName) {
      echo "Please provide a command name.\n";
      return 1;
    }

    $this->generateCommandFile($commandName);
    $this->updateRegistry($commandName);

    echo "Command $commandName has been generated and added to the registry.\n";
    return 0;
  }

  private function generateCommandFile(string $commandName): void
  {
    $template = <<<'EOD'
      <?php

      namespace Commands\Programs;

      use Commands\AbstractCommand;
      use Commands\Argument;

      class CommandName extends AbstractCommand
      {
        // TODO: エイリアスを設定してください。
        protected static ?string $alias = '{INSERT COMMAND HERE}';

        // TODO: 引数を設定してください。
        public static function getArguments(): array
        {
          return [];
        }

        // TODO: 実行コードを記述してください。
        public function execute(): int
        {
          return 0;
        }
      }
      EOD;

    $content = str_replace('CommandName', $commandName, $template);
    $content = str_replace('{INSERT COMMAND HERE}', strtolower($commandName), $content);

    $filePath = __DIR__ . "/$commandName.php";
    file_put_contents($filePath, $content);
  }

  private function updateRegistry(string $commandName): void
  {
    $registryPath = __DIR__ . '/../registry.php';
    $registryContent = file_get_contents($registryPath);

    $newEntry = "  Programs\\$commandName::class,";
    $updatedContent = str_replace('];', "$newEntry\n];", $registryContent);

    file_put_contents($registryPath, $updatedContent);
  }
}
