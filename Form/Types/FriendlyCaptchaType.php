<?php

namespace Robole\SuluFormCaptchaBundle\Form\Types;

use Sulu\Bundle\FormBundle\Dynamic\FormFieldTypeConfiguration;
use Sulu\Bundle\FormBundle\Dynamic\FormFieldTypeInterface;
use Sulu\Bundle\FormBundle\Dynamic\Types\SimpleTypeTrait;
use Sulu\Bundle\FormBundle\Entity\FormField;
use Symfony\Component\Form\FormBuilderInterface;

class FriendlyCaptchaType implements FormFieldTypeInterface
{
    use SimpleTypeTrait;

    public function getConfiguration(): FormFieldTypeConfiguration
    {
        return new FormFieldTypeConfiguration(
            'sulu_form_captcha_bundle.form.type.friendly_captcha',
            __DIR__ . '/../../Resources/config/form-fields/field_captcha.xml',
            'special',
        );
    }

    public function build(FormBuilderInterface $builder, FormField $field, string $locale, array $options): void
    {
        $options['constraints'] = new \CORS\Bundle\FriendlyCaptchaBundle\Validator\FriendlyCaptchaValid();
        $builder->add($field->getKey(), \CORS\Bundle\FriendlyCaptchaBundle\Form\Type\FriendlyCaptchaType::class, $options);
    }
}
