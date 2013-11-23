# HTMLEditorField extras

This module adds some new functionality to the HTMLEditorFields in Silverstripe

## Requirements

*  SilverStripe 3.1

## Features

*  Add Google link tracking to a link in the CMS
*  Add modal toggling to a link in the CMS (still in progress)

## Install using composer

```
composer require milkyway/silverstripe-htmleditorfield-extras:*
```

## Setting up

The settings in this module use classes on the HTMLEditorField. To allow google link tracker, add the class
**google-link-tracking** to the HTMLEditorField.

```
$editor = HTMLEditorField::create('Content')->addExtraClass('google-link-tracking');
```