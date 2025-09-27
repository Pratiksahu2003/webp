# Company Configuration System

This document explains how to use the centralized company configuration system implemented in your VanTroZ project.

## Configuration File

All company information is stored in `config/company.php`. This includes:

- Company name and tagline
- Contact information (email, phone, country flag)
- Office address details
- Branding information (logos, colors)
- Social media links

## Current Configuration

```php
'name' => 'VanTroZ',
'tagline' => 'Your Trusted Technology Partner',

'contact' => [
    'email' => 'support@vantroz.com',
    'phone' => '+91 9205668819',
    'country_code' => '+91',
    'country_flag' => '🇮🇳',
],

'address' => [
    'primary' => [
        'name' => 'Head Office',
        'line1' => 'JMD MEGAPOLIS',
        'city' => 'Gurugram',
        'state' => 'Haryana',
        'country' => 'India',
        'full' => 'JMD MEGAPOLIS, Gurugram, Haryana, India',
    ],
],
```

## Usage in Views

### Direct Config Access
```php
{{ config('company.name') }}
{{ config('company.contact.email') }}
{{ config('company.contact.phone') }}
{{ config('company.address.primary.full') }}
```

### Using Helper Class
```php
use App\Helpers\CompanyHelper;

CompanyHelper::name()
CompanyHelper::email()
CompanyHelper::phone()
CompanyHelper::fullAddress()
```

### Global View Variables
The `CompanyServiceProvider` makes company data available in all views as `$company`:

```php
{{ $company['name'] }}
{{ $company['email'] }}
{{ $company['phone'] }}
{{ $company['fullAddress'] }}
```

## Files Updated

### Layout Files
- `resources/views/layouts/website.blade.php` - Navigation and footer
- `resources/views/contact.blade.php` - Contact page information

### Configuration Files
- `config/company.php` - Main company configuration
- `config/mail.php` - Email configuration
- `config/app.php` - Application name

### Database Files
- `database/seeders/AdminUserSeeder.php` - Admin user email

### Helper Files
- `app/Helpers/CompanyHelper.php` - Helper methods
- `app/Providers/CompanyServiceProvider.php` - Service provider
- `bootstrap/app.php` - Service provider registration

## Benefits

1. **Centralized Management**: All company information in one place
2. **Easy Updates**: Change once, update everywhere
3. **Consistency**: Ensures all contact information matches
4. **Maintainability**: Easier to maintain and update
5. **Environment Flexibility**: Can be overridden via environment variables

## Environment Variables

You can override any config value using environment variables in your `.env` file:

```env
COMPANY_NAME="VanTroZ"
COMPANY_EMAIL="support@vantroz.com"
COMPANY_PHONE="+91 9205668819"
```

Then reference them in the config file:
```php
'name' => env('COMPANY_NAME', 'VanTroZ'),
'contact' => [
    'email' => env('COMPANY_EMAIL', 'support@vantroz.com'),
    'phone' => env('COMPANY_PHONE', '+91 9205668819'),
],
```

## Adding New Information

To add new company information:

1. Add it to `config/company.php`
2. Add helper methods to `CompanyHelper.php` if needed
3. Update `CompanyServiceProvider.php` to share with views
4. Use in your templates

Example:
```php
// In config/company.php
'business_hours' => [
    'monday_friday' => '9:00 AM - 6:00 PM',
    'saturday' => '10:00 AM - 4:00 PM',
    'sunday' => 'Closed',
],

// In views
{{ config('company.business_hours.monday_friday') }}
```