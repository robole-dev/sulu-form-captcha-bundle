<?php

namespace Robole\SuluFormCaptchaBundle\Form\Types;

use Sulu\Bundle\FormBundle\Dynamic\FormFieldTypeConfiguration;
use Sulu\Bundle\FormBundle\Dynamic\FormFieldTypeInterface;
use Sulu\Bundle\FormBundle\Dynamic\Types\SimpleTypeTrait;
use Sulu\Bundle\FormBundle\Entity\FormField;
use Symfony\Component\Form\FormBuilderInterface;

class AltchaCaptchaType implements FormFieldTypeInterface
{
    use SimpleTypeTrait;

    public function getConfiguration(): FormFieldTypeConfiguration
    {
        return new FormFieldTypeConfiguration(
            'sulu_form_captcha_bundle.form.type.altcha_captcha',
            __DIR__ . '/../../Resources/config/form-fields/field_captcha.xml',
            'special',
        );
    }

    public function build(FormBuilderInterface $builder, FormField $field, string $locale, array $options): void
    {
        $options['constraints'] = new \Tito10047\AltchaBundle\Validator\Altcha();
        $builder->add($field->getKey(), \Tito10047\AltchaBundle\Type\AltchaType::class, $options);
    }
}
