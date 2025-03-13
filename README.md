<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Installation and Setup

### Prerequisites
- PHP >= 7.3
- Composer
- Laravel >= 8.0
- Node.js & NPM

### Step 1: Clone the repository
```bash
git clone https://github.com/cocoth/worksync.git
cd worksync
```

### Step 2: Install dependencies
```bash
composer install
npm install
```

### Step 3: Configure environment
Copy the `.env.example` file to `.env` and update the necessary environment variables.
```bash
cp .env.example .env
```

### Step 4: Generate application key
```bash
php artisan key:generate
```

### Step 5: Run migrations
```bash
php artisan migrate
```

### Step 6: Configure Admin Filament
```bash
php artisan make:filament-user
```

### Step 7: Serve the application
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser to see the application running.

## Usage
- To access the Filament admin panel, navigate to `/admin` in your browser.
- Use the credentials you set up during the Filament installation to log in.

## Contributing
Feel free to submit issues or pull requests. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License.