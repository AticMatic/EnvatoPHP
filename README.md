# EnvatoPHP Laravel Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aticmatic/envatophp)](https://packagist.org/packages/aticmatic/envatophp)
[![Total Downloads](https://img.shields.io/packagist/dt/aticmatic/envatophp)](https://packagist.org/packages/aticmatic/envatophp)
[![License](https://img.shields.io/github/license/aticmatic/envatophp)](https://github.com/aticmatic/envatophp/blob/main/LICENSE)

This package provides an easy way to interact with the Envato API in your Laravel 10/11 applications.

## Installation

```bash
composer require aticmatic/envatophp
```

### Publish the configuration file:

```bash
php artisan vendor:publish --tag=envato-php-config
```

### Add your Envato Personal Token to your `.env` file:

```env
ENVATO_PERSONAL_TOKEN=your_actual_envato_personal_token
```

**Important:** Do not commit your `.env` file to version control.

## Usage

```php
use AticMatic\EnvatoPHP\EnvatoPHP;

$envatoApi = app('envato-php'); // Or use the facade if you set it up

try {
    $itemDetails = $envatoApi->getItemDetails(20787128); // Example Item ID
    // Process $itemDetails (e.g., dd($itemDetails);)
} catch (\Exception $e) {
    // Handle the exception (log, display error message, etc.)
    echo "Error: " . $e->getMessage();
    Log::error($e); // Log the exception for debugging
}

// Example using the Facade (if you added it to config/app.php aliases):
// use AticMatic\EnvatoPHP\Facades\EnvatoPHP;
// try {
//      $itemDetails = EnvatoPHP::getItemDetails(20787128);
// } // ... etc.
```

## Available Methods

(Add documentation for each API method you implement)

- `getItemDetails(int $itemId)`: Retrieves details about a specific Envato item. Returns an array of item data or throws an exception on error.
- (Add other methods here as you develop them)

## Error Handling

The package throws exceptions when API requests fail. It's crucial to wrap your API calls in try-catch blocks to handle these exceptions gracefully. The exceptions will contain details about the error returned by the Envato API. It's also recommended to log the exceptions for debugging purposes.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

This package is open-source software licensed under the [MIT license](LICENSE).

