# Eloquent Merge Select

[![Latest Version on Packagist](https://img.shields.io/packagist/v/f-liva/eloquent-merge-select.svg?style=flat-square)](https://packagist.org/packages/f-liva/eloquent-merge-select)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/f-liva/eloquent-merge-select/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/f-liva/eloquent-merge-select/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/f-liva/eloquent-merge-select/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/f-liva/eloquent-merge-select/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/f-liva/eloquent-merge-select.svg?style=flat-square)](https://packagist.org/packages/f-liva/eloquent-merge-select)

Add additional select columns to Eloquent queries without removing those already present.

## Installation

You can install the package via composer:

```bash
composer require f-liva/eloquent-merge-select
```

## Usage

```php
User::query()
    ->select(['id', 'name'])
    ->mergeSelect(['email', 'created_at'])
    ->get();

// select `id`, `name`, `email`, `created_at` from `users`
```

## Testing

```bash
composer pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Federico Liva](https://github.com/f-liva)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
