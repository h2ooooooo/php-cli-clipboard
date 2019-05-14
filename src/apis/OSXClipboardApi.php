<?php


namespace jalsoedesign\CliClipboard\apis;

/**
 * Class OSXClipboardApi
 *
 * @package jalsoedesign\CliClipboard\apis
 *
 * @see https://vinoaj.com/guides/2018/osx-terminal-copy-file-to-clipboard/
 */
class OSXClipboardApi extends AbstractClipboardApi {
    /**
     * Gets the current clipboard contents
     *
     * @return string
     */
    public function get() {
        $contents = shell_exec('pbpaste');

        // Since pbpaste removes the data from the clipboard, let's set it again immediately
        $this->set($contents);

        if (empty($contents)) {
            return '';
        }

        return $contents;
    }

    /**
     * Sets the current clipboard contents
     *
     * @param string $contents
     */
    public function set($contents) {
        $this->pipeFileIntoCommand('pbcopy', $contents);
    }

    /**
     * Clears the clipboard contents
     *
     * @note Is really just shorthand for OSXClipboardApi->set('');
     */
    public function clear() {
        $this->exec('pbcopy < ""');
    }
}