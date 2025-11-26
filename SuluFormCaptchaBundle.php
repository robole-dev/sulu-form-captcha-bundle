<?php

declare(strict_types=1);

namespace Robole\SuluFormCaptchaBundle;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SuluFormCaptchaBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $loader = new XmlFileLoader($builder, new FileLocator(__DIR__ . '/Resources/config'));

        if (class_exists(\PixelOpen\CloudflareTurnstileBundle\Type\TurnstileType::class)) {
            $loader->load('type_turnstile.xml');
        }

        if (class_exists(\Gregwar\CaptchaBundle\Type\CaptchaType::class)) {
            $loader->load('type_gregwar.xml');
        }

        if (class_exists(\CORS\Bundle\FriendlyCaptchaBundle\Form\Type\FriendlyCaptchaType::class)) {
            $loader->load('type_friendly.xml');
        }

        if (class_exists(\Tito10047\AltchaBundle\Type\AltchaType::class)) {
            $loader->load('type_altcha.xml');
        }
    }

    public function prependExtension(ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        $containerBuilder->prependExtensionConfig('framework', [
            'translator' => [
                'paths' => [
                    '%kernel.project_dir%/vendor/robole/sulu-form-captcha-bundle/translations'
                ],
            ],
        ]);

        $containerBuilder->prependExtensionConfig('twig', [
            'paths' => [
                '%kernel.project_dir%/vendor/robole/sulu-form-captcha-bundle/Resources/views' => 'SuluFormCaptcha'
            ],
        ]);
    }
}
