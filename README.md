![GitHub release](https://flat.badgen.net/github/release/robole-dev/sulu-form-captcha-bundle)
![Supports Sulu 2.6 or later](https://flat.badgen.net/badge/Sulu/2.6/52B5C9?icon=php)

# SuluFormCaptchaBundle

> Extension for SuluFormBundle that adds third-party captcha providers.

## Installation

This bundle requires PHP 8.2 or later.

1. Open a command console, enter your project directory and run:

```console
composer require robole/sulu-form-captcha-bundle
```

If not automagically done, add the bundle to your `config/bundles.php` file:

```php
return [
    //...
    Robole\SuluFormCaptchaBundle\SuluFormCaptchaBundle::class => ['all' => true],
];
```

2. Install and configure one or mutiple captcha providers from below. Once installed, each provider can be selected in the Sulu form editor.   

### Use with Cloudflare Turnstile

1. Install [PixelOpen Cloudflare Turnstile Bundle](https://github.com/Pixel-Open/cloudflare-turnstile-bundle):
> composer require pixelopen/cloudflare-turnstile-bundle

If not automagically done, add the bundle to your `config/bundles.php` file:

```php
return [
    //...
    PixelOpen\CloudflareTurnstileBundle\PixelOpenCloudflareTurnstileBundle::class => ['all' => true]
];
```

2. Visit Cloudfare, create a site key and secret key, save the keys to `.env` and link via service configuration in `config/packages/pixel_open_cloudlflare_turnstile.yaml`:
```yaml
pixel_open_cloudflare_turnstile:
    key: "%env(TURNSTILE_KEY)%"
    secret: "%env(TURNSTILE_SECRET)%"
```

For more information, refer to the [bundle repository](https://github.com/Pixel-Open/cloudflare-turnstile-bundle).

### Use with Gregwar Captcha

1. Install [Gregwar CaptchaBundle](https://github.com/Gregwar/CaptchaBundle):
> composer require gregwar/captcha-bundle

If not automagically done, add the bundle to your `config/bundles.php` file:

```php
return [
    //...
    Gregwar\CaptchaBundle\GregwarCaptchaBundle::class => ['all' => true]
];
```

2. Customize the global bundle configuration in `config/packages/gregwar_captcha.yaml`: 
```yaml
gregwar_captcha:
  width: 160
  height: 50
```

For more information on configuration and form theming, refer to the [bundle repository](https://github.com/Gregwar/CaptchaBundle).

### Use with Friendly Captcha

__Attention:__ This bundle currently only supports Symfony 6 and Friendly Captcha v1!

1. Install [CORS Friendly Captcha Bundle](https://github.com/cors-gmbh/friendly-captcha-bundle):
> composer require cors/friendly-captcha-bundle

```php
return [
    //...
    CORS\Bundle\FriendlyCaptchaBundle\CORSFriendlyCaptchaBundle::class => ['all' => true],
];
```

2. Visit [Friendly Captcha](https://friendlycaptcha.com), create a site key and secret key, save the keys to `.env` and link via service configuration in `config/packages/cors_friendly_captcha.yaml`:
```yaml
cors_friendly_captcha:
    sitekey: "%env(FRIENDLY_SITEKEY)%"
    secret: "%env(FRIENDLY_SECRET)%"
    use_eu_endpoints: true
```

3. Import the widget via npm in your application or load from CDN, e.g. in `base.html.twig`:
```html
  <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/friendly-challenge@0.9.18/widget.module.min.js"
      async
      defer
      ></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/friendly-challenge@0.9.18/widget.min.js" async defer></script>
``` 

For more information, refer to the [bundle repository](https://github.com/cors-gmbh/friendly-captcha-bundle).

## Theming

This bundle provides a minimal `theme.html.twig` which extends `@SuluForm/themes/basic.html.twig`. Use it like this:
```twig
<body>
    {% if content.form %}
        {% if app.request.get('send') != 'true' %}
            {% form_theme content.form '@SuluFormCaptcha/theme.html.twig' %}
            {{ form(content.form) }}
        {% else %}
            {{ view.form.entity.successText|raw }}
        {% endif %}
    {% endif %}
</body>
```

To customize the default blocks (or to customize the default blocks provided by SuluFormBundle), extend `@SuluFormCaptcha/theme.html.twig` similar as described in [SuluFormBundle theming.md](https://github.com/sulu/SuluFormBundle/blob/2.5/Resources/doc/theming.md).

## Scripts

- To check the coding standards, run:
  > composer php-cs

- To apply coding standards, run:
  > composer php-cs-fix
