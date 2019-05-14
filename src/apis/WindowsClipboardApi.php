<?php


namespace jalsoedesign\CliClipboard\apis;

/**
 * Class WindowsClipboardApi
 *
 * @package jalsoedesign\CliClipboard\apis
 *
 * @see https://docs.microsoft.com/en-us/windows-server/administration/windows-commands/clip
 * @see https://docs.microsoft.com/en-us/dotnet/api/system.windows.forms.clipboard.gettext?view=netframework-4.8
 */
class WindowsClipboardApi extends AbstractClipboardApi {
    /**
     * Gets the current clipboard contents
     *
     * @return string
     */
    public function get() {
        $contents = shell_exec('powershell -sta "add-type -as System.Windows.Forms; [windows.forms.clipboard]::GetText()"');

        if (empty($contents)) {
            return '';
        }

        // Windows clipboard outputs an \n character at the end of the clipboard regardless of its actual value
        return rtrim($contents, "\n");
    }

    /**
     * Sets the current clipboard contents
     *
     * @param string $contents
     */
    public function set($contents) {
        $this->pipeFileIntoCommand('clip', $contents);
    }

    /**
     * Clears the clipboard contents
     */
    public function clear() {
        $this->exec('echo off | clip');
    }
}