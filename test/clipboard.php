<?php

use jalsoedesign\CliClipboard\Clipboard;

require_once(__DIR__ . '/../vendor/autoload.php');

$contents = sprintf('%06x', mt_rand(0x000000, 0xffffff));
$clipboard = Clipboard::instance();

// Get initial clipboard
printf('# Current clipboard content: "%s"', $clipboard->get());
echo PHP_EOL . PHP_EOL;

// Set to custom value
printf('> Setting clipboard content to "%s"..', $contents);
echo PHP_EOL;
$clipboard->set($contents);

// Get the custom value
printf('# Current clipboard content: "%s"', $clipboard->get());
echo PHP_EOL . PHP_EOL;

// Clear the clipboard
printf('> Clearing clipboard contents');
echo PHP_EOL;
$clipboard->clear();

// Get the cleared value (an empty string)
printf('# Current clipboard content: "%s"', $clipboard->get());
echo PHP_EOL . PHP_EOL;