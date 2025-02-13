![GitHub release](https://flat.badgen.net/github/release/robole-dev/sulu-form-captcha-bundle)
![Supports Sulu 2.6 or later](https://flat.badgen.net/badge/Sulu/2.6/52B5C9?icon=php)

# SuluFormCaptchaBundle

> Sulu CMS FormBundle extensions to add Gregwar Captcha and Cloudflare Turnstile Captcha


## Installation

This bundle requires PHP 8.2 or later.

1. Open a command console, enter your project directory and run:

```console
composer require robole/sulu-form-captcha-bundle
```

If you're **not** using Symfony Flex, you'll also need to add the bundle in your `config/bundles.php` file:

```php
return [
    //...
    Robole\SuluFormCaptchaBundle\SuluFormCaptchaBundle::class => ['all' => true],
];
```

### Use with Cloudflare Turnstile

@todo analog zu https://github.com/sulu/SuluFormBundle/blob/89ff00dfcdb2df5ffd85e5d1ca66f614d6b0c6d9/Resources/doc/recaptcha.md#L4 gestalten
...

### Use with Gregwar Captcha


@todo analog zu https://github.com/sulu/SuluFormBundle/blob/89ff00dfcdb2df5ffd85e5d1ca66f614d6b0c6d9/Resources/doc/recaptcha.md#L4 gestalten
...

### Scripts

- To check the coding standards, run:
  > composer php-cs

- To apply coding standards, run:
  > composer php-cs-fix
