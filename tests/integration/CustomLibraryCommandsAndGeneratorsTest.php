<?php

namespace Unish;

/**
 * @group commands
 */
class CustomLibraryCommandsAndGeneratorsTest extends UnishIntegrationTestCase
{
    /**
     * Tests that commands provided by custom libraries are registered.
     */
    public function testCustomLibraryCommandsAndGenerators(): void
    {
        $this->drush('list');
        $this->assertStringContainsString('custom_cmd', $this->getOutput());
        $this->assertStringContainsString('Auto-discoverable custom command', $this->getOutput());
        $this->drush('custom_cmd');
        $this->assertStringContainsString('Hello world!', $this->getOutput());
        $this->drush('generate', ['list']);
        $this->assertStringContainsString('custom-testing-generator', $this->getOutput());
        $this->assertStringContainsString('Custom testing generator', $this->getOutput());
    }
}
