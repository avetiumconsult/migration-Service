# Migration Service

## Overview

The Migration Service is a robust application designed to facilitate seamless data migration between two cross-platform applications: WooCommerce (an e-commerce platform) and Zoho (a CRM and business application suite). This service automates the transfer and synchronization of products, orders, and customer data, ensuring data consistency and reducing manual data entry efforts.

## Features

- **Product Synchronization**: Automatically sync products between WooCommerce and Zoho.
- **Order Synchronization**: Sync orders from WooCommerce to Zoho, ensuring all sales data is captured in the CRM.
- **Customer Management**: Automatically create and update customer records in Zoho when new orders are placed on WooCommerce.
- **Error Handling**: Robust error handling and logging to ensure data integrity.
- **Scalable Architecture**: Built using modern frameworks and best practices for scalability and maintainability.

## Technologies Used

- **Programming Language**: PHP (Laravel Framework)
- **APIs**: WooCommerce REST API, Zoho API
- **Authentication**: HTTP Basic Auth for WooCommerce, OAuth for Zoho
- **Dependencies**: Composer packages for API integrations

## Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- WooCommerce store with API credentials
- Zoho account with API credentials

### Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/migration-service.git
    cd migration-service
    ```

2. **Install dependencies**:
    ```bash
    composer install
    ```

3. **Set up environment variables**:
    Copy the `.env.example` to `.env` and fill in the necessary API credentials for WooCommerce and Zoho.
    ```bash
    cp .env.example .env
    ```

4. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

5. **Configure API Credentials**:
    Add your WooCommerce and Zoho API credentials to the `.env` file.
    ```dotenv
    WOOCOMMERCE_CONSUMER_KEY=your_woocommerce_consumer_key
    WOOCOMMERCE_CONSUMER_SECRET=your_woocommerce_consumer_secret
    ZOHO_CLIENT_ID=your_zoho_client_id
    ZOHO_CLIENT_SECRET=your_zoho_client_secret
    ZOHO_REDIRECT_URI=your_zoho_redirect_uri
    ```

### Usage

1. **Run the application**:
    ```bash
    php artisan serve
    ```

2. **Endpoints**:
    - **Product Sync**: `POST /api/sync/products`
    - **Order Sync**: `POST /api/sync/orders`
    - **Customer Sync**: `POST /api/sync/customers`

### Example Request

**Sync Products from WooCommerce to Zoho**:
```bash
curl -X POST http://localhost:8000/api/sync/products


## Contributing

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a new Pull Request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any questions or support, please contact [gabriel.ifoga@avetiumconsult.com](gabriel.ifoga@avetiumconsult.com).
