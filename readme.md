# Logos for Alfred

A quick little workflow to open verses in Alfred.

## Installation

1. [Download the latest version](https://github.com/vmitchell85/logos-alfred-workflow/releases/download/0.4/Logos.alfredworkflow)
2. Install the workflow by double-clicking the `.alfredworkflow` file
3. The Import window will appear and allow you to add the workflow to a category and set your PreferredBible (see below)
4. Click "Import" to finish importing. You'll now see the workflow listed in the left sidebar of your Workflows preferences pane.

## Preferred Bible

When installing this workflow you can set your Preferred Bible. This will allow you to use the `bible` keyword. This value corresponds to the translations available in Logos. Known values are `NASB95`, `ESV`, `NIV`, `NLT`, `NKJV`. Others may work but are unknown at this time.

**NOTE: If you leave this blank the `bible` keyword will not work properly**

![Workflow Import](./assets/import.gif)

### Updating

It is possible to update your preferred Bible after importing the workflow (see below)

![Preferred Bible Update](./assets/update.gif)

## Usage

Type any of the translation or command keywords available below followed by a "search term"

**Examples:**
- `l Commentary` : Searches your Logos library for "Commentary"
- `lb steward` : Searches Logos Bibles for "steward"
- `lm temple` : Searches Logos Media for "temple"
- `bible Ps 119` : Opens your Preferred Bible (see above) to Psalm 119
- `nasb Matt 28:18` : Opens the NASB to Matthew 18:18
- `niv Rev 3:20` : Opens the NIV Bible to Revelation 3:20
- `esv Jn 3:16` : Opens the ESV Bible to John 3:16
- `nlt rom 8` : Opens the NLT Bible to Romans 8

## Commands Available
- `l {search term}` - Searches your entire Logos library for the search term specified
- `lb {search term}` - Searches your Logos Bibles for the search term specified
- `lm {search term}` - Searches your Logos Media for the search term specified
- `bible {passage}` - Opens your Preferred Bible (see above) to the specified passage

## Translations Available
- `nasb {passage}` - New American Standard Bible (1995)
- `esv {passage}` - English Standard Version
- `niv {passage}` - New International Version (1984)
- `nlt {passage}` - New Living Translation
- `nkjv {passage}` - New Kings James Version

**Open an [issue](https://github.com/vmitchell85/logos-alfred-workflow/issues) here on github for requests.**
