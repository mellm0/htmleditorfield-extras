# HTMLEditorField extras

This module adds some new functionality to the HTMLEditorFields in Silverstripe

## Requirements

*  SilverStripe 3.1

## Features

*  Add Google link tracking to a link in the CMS
*  Add modal toggling to a link in the CMS (still in progress, relies on Twitter Bootstrap)
*  Allows accepting classes from Textarea to be inserted into HTMLEditorField body
*  Set different content css for each HTMLEditorField
*  Set a max length on HTMLEditorField

## Install using composer

```
composer require milkyway/silverstripe-htmleditorfield-extras:*
```

## Setting up

### Adding classes to the HTMLEditorField iframe

Setting up your HTMLEditorField for different parts of your site (such as emails and website, which usually use
different stylesheets), can be tiring. This solution will add a class to the HTMLEditorField iframe body, so that you
can change the styles but use the one stylesheet (this is especially easy to do with LESS/SCSS using imports)

```
$editor = HTMLEditorField::create('Content')->setAttribute('data-tinymce-classes', 'email-body print');
```

### Overwriting the content css for a HTMLEditorField

If the above method is not enough, you can also overwrite the content_css of the HTMLEditorField by setting the
data attribute data-tinymce-content-css:

```
$editor = HTMLEditorField::create('Content')->setAttribute('data-tinymce-content-css', '/here/there/layout.css');
```

### Setting a max length to a HTMLEditorField

Now your HTMLEditorField will use the max length set on the textarea:

```
$editor = HTMLEditorField::create('Content')->setAttribute('maxlength', 255);
```

I have added some other configuration as well, so that you can display how many characters remain. To add an indicator,
set the following on your editor:

```
$editor->setAttribute('data-tinymce-maxlength-indicator', true);
```

That will use the default indicator (which is the JS notifications, which may get annoying). To use a custom indicator,
you can use the ID of the element to fill with text instead:

```
$editor->setAttribute('data-tinymce-maxlength-indicator', '#Content-MaxLength-Indicator');
```

### Google Link Tracking

The settings in this module use classes on the HTMLEditorField. To allow google link tracker, add the class
**google-link-tracking** to the HTMLEditorField.

```
$editor = HTMLEditorField::create('Content')->addExtraClass('google-link-tracking');
```

### Extras

I have added some utility classes for removing the buttons you won't need in certain situations. Adding these classes
to HTMLEditorField will change the HTMLEditorField (it will only remove using CSS, so JS calls can still call them...)

* email-friendly : Remove the 'Styles' dropdown
* limited : Remove most buttons (the last 2 lines) except the bold, italic, underline, strike through, styles, hr & charmap
* limited-with-links : Same as limited, but keeps the links plugin