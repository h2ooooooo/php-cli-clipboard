<?php


namespace jalsoedesign\CliClipboard\apis;

/**
 * Class AbstractClipboardApi
 *
 * @package jalsoedesign\CliClipboard\apis
 */
abstract class AbstractClipboardApi
{
    /**
     * Gets the current clipboard contents
     *
     * @return string
     */
    abstract public function get();

    /**
     * Sets the current clipboard contents
     *
     * @param string $contents
     */
    abstract public function set($contents);

    /**
     * Clears the clipboard contents
     */
    abstract public function clear();

    /**
     * @param string $command
     * @param string $contents
     *
     * @return void
     */
    protected function pipeFileIntoCommand($command, $contents) {
        $tempFile = tempnam(sys_get_temp_dir(), 'clp');

        file_put_contents($tempFile, $contents);

        $cmd = sprintf('%s < %s', $command, escapeshellarg($tempFile));

        $this->exec($cmd);

        unlink($tempFile);
    }

    /**
     * Executes a command internally (usually shell_exec)
     *
     * @param string $cmd
     *
     * @return string|null
     */
    protected function exec($cmd) {
        return shell_exec($cmd);
    }
}