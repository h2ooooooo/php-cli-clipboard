<?php


namespace jalsoedesign\CliClipboard\apis;


/**
 * Class MockClipboardApi
 *
 * @package jalsoedesign\CliClipboard\apis
 */
class MockClipboardApi {
    /** @var string */
    private $contents;

    /**
     * Gets the current clipboard contents
     *
     * @return string
     */
    public function get() {
        $contents = $this->contents;

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
        $this->contents = $contents;
    }

    /**
     * Clears the clipboard contents
     */
    public function clear() {
        $this->contents = '';
    }
}