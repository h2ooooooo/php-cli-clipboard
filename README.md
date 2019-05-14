# php-cli-clipboard

Enables a clipboard API to get/set and clear the clipboard on various platforms

## Platform Support

| Platform | Support | Reads with        | Writes with |
|----------|---------|-------------------|-------------|
| Windows  | Yes ✅  | [Powershell script](https://gist.github.com/luser/da5ce7e12c6a9591f1a7e9d111743036) | [`clip.exe`](https://ss64.com/nt/clip.html)  |
| OSX      | Yes ✅  | [`pbpaste`](https://ss64.com/osx/pbpaste.html) | [`pbcopy`](https://ss64.com/osx/pbcopy.html)    |
| Linux    | *NO* ❎ |                   |             |

Unsupported platforms will use a MockClipboardApi api, that will mimick the clipboard, but won't actually get/set/clear anything apart from its local state.

## Usage

### Get the current clipboard contents

```php
// Instantiate the clipboard class
$clipboard = \jalsoedesign\CliClipboard\Clipboard::instance();

// Get the current contents of the clipboard
$contents = $clipboard->get();

// Print the content
echo $contents;
```

### Set the current clipboard contents

```php
// Instantiate the clipboard class
$clipboard = \jalsoedesign\CliClipboard\Clipboard::instance();

// Set the current contents of the clipboard to "foobar"
$clipboard->set('foobar');
```
   

### Clears the current clipboard contents

```php
// Instantiate the clipboard class
$clipboard = \jalsoedesign\CliClipboard\Clipboard::instance();

// Clear the current clipboard contents
$clipboard->clear();
```