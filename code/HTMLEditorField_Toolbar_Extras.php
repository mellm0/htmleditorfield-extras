<?php
/**
 * Milkyway Multimedia
 * HTMLEditorField_Toolbar_Extras.php
 *
 * Add Google Link Builder to modal
 *
 * @package milkyway/silverstripe-htmleditorfield-extras
 * @author Mellisa Hankins <mellisa.hankins@me.com>
 */

class HTMLEditorField_Toolbar_Extras extends Extension
{
    public function updateLinkForm($form)
    {
        $numericLabelTmpl = '<span class="step-label"><span class="flyout">%s</span><span class="arrow"></span>'
            . '<strong class="title">%s</strong></span>';

        $form->Fields()->insertAfter($fields[] = CompositeField::create(
            LiteralField::create('Step-Google-URLTracking',
                '<div class="step2">'
                . sprintf($numericLabelTmpl, '+', _t('HtmlEditorField.GOOGLE-LINK_TRACKING', 'Google Link Tracking')) . '</div>'
            ),
            $fields[] = TextField::create('utm_source', _t('HtmlEditorField.GOOGLE-CAMPAIGN_SOURCE', 'Campaign Source'))
                ->setDescription(_t('HtmlEditorField.DESC-GOOGLE-CAMPAIGN_SOURCE', 'Referrer/Subject (eg. Google or July Newsletter). This must be filled to track this link.')),
            $fields[] = TextField::create('utm_medium', _t('HtmlEditorField.GOOGLE-CAMPAIGN_MEDIUM', 'Campaign Medium'))
                ->setDescription(_t('HtmlEditorField.DESC-GOOGLE-CAMPAIGN_MEDIUM', 'Marketing Medium (eg. email, banner, CPC). This must be filled to track this link.')),
            $fields[] = TextField::create('utm_term', _t('HtmlEditorField.GOOGLE-CAMPAIGN_TERM', 'Campaign Term'))
                ->setDescription(_t('HtmlEditorField.DESC-GOOGLE-CAMPAIGN_TERM', 'Keywords - usually used only for CPC')),
            $fields[] = TextField::create('utm_content', _t('HtmlEditorField.GOOGLE-CAMPAIGN_CONTENT', 'Campaign Content'))
                ->setDescription(_t('HtmlEditorField.DESC-GOOGLE-CAMPAIGN_CONTENT', 'Used for A/B Testing - to differentiate between links that point to the same URL')),
            $fields[] = TextField::create('utm_campaign', _t('HtmlEditorField.GOOGLE-CAMPAIGN_NAME', 'Campaign Name'))
                ->setDescription(_t('HtmlEditorField.DESC-GOOGLE-CAMPAIGN_NAME', '(eg. promo code, product) Used for keyword analysis - useful for identifying a product promotion or strategic campaign'))
        )->addExtraClass('field google-analytics-tracking')->setTitle('&nbsp;'), 'TargetBlank');

        if ($this->owner->config()->bootstrap_modals) {
            $form->Fields()->insertAfter($fields[] = CheckboxField::create('TargetModal', _t('HtmlEditorField.TARGET_MODAL', 'Open link in modal window?')), 'TargetBlank');
        }

        foreach ($fields as $field) {
            $field->setForm($form);
        }
    }
}
