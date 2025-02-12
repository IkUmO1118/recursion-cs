<?php

interface SchemaMigration
{
  public function up(): array;
  public function dowm(): array;
}
