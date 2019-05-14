<?php


namespace jalsoedesign\CliClipboard;

use Tivie\OS\Detector as OsDetector;
use jalsoedesign\CliClipboard\apis\AbstractClipboardApi;
use jalsoedesign\CliClipboard\apis\WindowsClipboardApi;
use jalsoedesign\CliClipboard\apis\OSXClipboardApi;
use jalsoedesign\CliClipboard\apis\MockClipboardApi;

/**
 * Class Clipboard
 * @package jalsoedesign\CliClipboard
 */
class Clipboard {
    /** @var Clipboard */
    private static $instance;

    /**
     * @return Clipboard
     */
    public static function instance() {
        if (static::$instance === null) {
            static::$instance = new Clipboard();
        }

        return static::$instance;
    }

    /** @var AbstractClipboardApi */
    protected $api;

    /**
     * Clipboard constructor.
     */
    public function __construct() {
        $os = new OsDetector();

        if ($os->isWindowsLike()) {
            $this->api = new WindowsClipboardApi();
        } else if ($os->isOSX()) {
            $this->api = new OSXClipboardApi();
        } else {
            // We weren't able to find a suiting API - let's just use the MockClipboardApi
            $this->api = new MockClipboardApi();
        }
    }

    /**
     * Gets the current clipboard contents
     *
     * @return string
     */
    public function get() {
        return $this->api->get();
    }

    /**
     * Sets the current clipboard contents
     *
     * @param string $contents
     */
    public function set($contents) {
        $this->api->set($contents);
    }

    /**
     * Clears the clipboard contents
     */
    public function clear() {
        $this->api->clear();
    }
}