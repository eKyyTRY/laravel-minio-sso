# Laravel MinIO SSO Integration

![Laravel Logo](https://laravel.com/img/logotype.min.svg)

[![Stars](https://img.shields.io/github/stars/eKyyTRY/laravel-minio-sso?style=social)](https://github.com/eKyyTRY/laravel-minio-sso)
[![Issues](https://img.shields.io/github/issues/eKyyTRY/laravel-minio-sso)](https://github.com/eKyyTRY/laravel-minio-sso/issues)
[![Forks](https://img.shields.io/github/forks/eKyyTRY/laravel-minio-sso?style=social)](https://github.com/eKyyTRY/laravel-minio-sso/network/members)

A Laravel-based web application that integrates **MinIO** for object storage and **Single Sign-On (SSO)** for user authentication. This project demonstrates how to seamlessly connect Laravel with both services for efficient file management and centralized authentication.

## Features

- **MinIO Integration**: Easily store and retrieve files via MinIO object storage.
- **SSO Authentication**: Centralized user authentication using CAS (Central Authentication Service).
- **Database-Driven**: MySQL or PostgreSQL for user management and session storage.
- **Laravel’s Robust Features**: Utilize the power of the Laravel framework including Eloquent ORM, Blade templating, and Artisan commands.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)


## Installation

Follow these steps to clone and set up the project on your local machine or server.

```bash
# Clone the Repository
git clone https://github.com/eKyyTRY/laravel-minio-sso.git
cd laravel-minio-sso

# Install Dependencies
composer install

# Set Permissions
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Environment Setup
cp .env.example .env

# Generate Application Key
php artisan key:generate

# Run Migrations
php artisan migrate

# Start the Application
php artisan serve

# The application will be available at http://localhost:8000.
```

## MinIO Setup

In the `.env` file, configure your MinIO details:

```bash
MINIO_ENDPOINT=localhost
MINIO_ACCESS_KEY=your_minio_access_key
MINIO_SECRET_KEY=your_minio_secret_key
MINIO_BUCKET=your_bucket_name
AWS_URL=http://url_minio:9000
AWS_ENDPOINT=http://url_minio:9000
```

Ensure your MinIO server is up and running. You can start it using:

```bash
minio server /path/to/your/storage
```

## SSO Configuration

Ensure your SSO (CAS) server is properly configured and running. Update the following in `.env`:

```bash
SSO_URL=https://your-cas-server.com
SSO_CALLBACK_URL=https://your-app.com/callback
```

## Usage

- **File Upload/Download**: Once configured, you can use the application to upload and download files to and from MinIO.
- **SSO Login**: Users will authenticate via your SSO server, centralizing login for multiple applications.

## Troubleshooting

- **Permission Issues**: If you encounter any "Permission denied" errors, ensure the storage and `bootstrap/cache` directories have the correct permissions.
- **Database Connection Issues**: Double-check your database credentials in the `.env` file and ensure the database service is running.

## Contributing

If you'd like to contribute to this project, feel free to fork the repository and submit a pull request. Any improvements or bug fixes are welcome!

## License

This project is licensed under the MIT License. See the LICENSE file for details.
```

### Penjelasan

- Pengaturan Visual : Teks ditata dengan baik, dan penjelasan di bagian atas ditambahkan untuk menarik perhatian pembaca.
- Pemisahan yang Jelas : Setiap bagian diberi judul jelas untuk memudahkan navigasi.
- Blok Kode Tersusun Rapi : Penggunaan blok kode `bash` memudahkan pembaca untuk menyalin perintah dengan mudah.

Jika ada perubahan tambahan atau elemen lain yang ingin Anda masukkan, silakan beri tahu!
