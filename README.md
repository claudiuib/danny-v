# Danny V Carpentry Website

A modern, responsive website for Danny V Carpentry, a London-based carpentry business specializing in quality craftsmanship and reliable service.

## 🏗️ About the Business

Founded in 2009 by Danny, Danny V Carpentry has grown from a small workshop passion project into one of London's most trusted carpentry services. The business offers a comprehensive range of carpentry services including:

- Garden fence installation and repairs
- New joist installation and existing joist repairs
- Floorboard leveling
- Decking installation
- Partition wall construction
- Dado rails & decorative mouldings
- Internal AC unit covers
- Sash window repairs
- Skirting board installation
- Kitchen installation
- Poker door installation

## 🚀 Technology Stack

### Backend
- **Laravel 12** - PHP framework
- **PHP 8.2+** - Server-side language
- **Livewire 3.6** - Full-stack framework for dynamic components

### Frontend
- **Tailwind CSS 4.1** - Utility-first CSS framework
- **Flowbite 3.1** - Component library
- **Vite 7.0** - Build tool and development server
- **Axios 1.11** - HTTP client

### Development Tools
- **Laravel Pint** - Code style fixer
- **PHPUnit 11.5** - Testing framework
- **Laravel Pail** - Log viewer
- **Concurrently** - Run multiple commands simultaneously

## 📁 Project Structure

```
danny-v/
├── app/
│   ├── Http/Controllers/     # Page controllers
│   ├── Livewire/            # Dynamic components (Header, Footer, HeroCarousel)
│   ├── Models/              # Eloquent models
│   └── Providers/           # Service providers
├── resources/
│   ├── css/                 # Tailwind CSS styles
│   ├── js/                  # JavaScript files
│   └── views/
│       ├── components/      # Blade components
│       ├── livewire/        # Livewire component views
│       └── pages/           # Page templates (home, about, services, portfolio, contact)
├── public/
│   ├── images/              # Static images (carousel, gallery, logo)
│   └── build/               # Compiled assets
├── database/                # SQLite database and migrations
└── routes/                  # Web routes
```

## 🛠️ Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (or MySQL/PostgreSQL)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd danny-v
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # SQLite database is already created
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

## 🚀 Development

### Start Development Server
```bash
# Start all services (Laravel server, queue worker, logs, and Vite)
composer run dev

# Or start services individually:
php artisan serve          # Laravel development server
npm run dev               # Vite development server
php artisan queue:listen  # Queue worker
php artisan pail          # Log viewer
```

### Available Scripts

**Composer Scripts:**
- `composer run dev` - Start all development services
- `composer run test` - Run PHPUnit tests

**NPM Scripts:**
- `npm run dev` - Start Vite development server
- `npm run build` - Build production assets

**Artisan Commands:**
- `php artisan serve` - Start Laravel development server
- `php artisan migrate` - Run database migrations
- `php artisan queue:listen` - Start queue worker
- `php artisan pail` - View application logs

## 📄 Pages & Features

### Website Pages
- **Home** (`/`) - Hero carousel and service overview
- **About** (`/about`) - Company story and values
- **Services** (`/services`) - Detailed service offerings
- **Portfolio** (`/portfolio`) - Project gallery
- **Contact** (`/contact`) - Contact information and form

### Livewire Components
- **Header** - Navigation and branding
- **Footer** - Site footer with links
- **HeroCarousel** - Dynamic image carousel on homepage

## 🎨 Styling & Assets

- **Tailwind CSS** for utility-first styling
- **Flowbite** components for UI elements
- **Italiana font** from Google Fonts for headings
- **Responsive design** optimized for mobile and desktop
- **Image optimization** with proper alt tags and responsive sizing

## 🗄️ Database

The project uses SQLite by default with the following tables:
- `users` - User authentication
- `cache` - Application cache
- `jobs` - Queue jobs

## 🧪 Testing

Run the test suite:
```bash
composer run test
# or
php artisan test
```

## 📦 Production Deployment

1. **Build assets for production**
   ```bash
   npm run build
   ```

2. **Optimize Laravel for production**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Set up web server** (Apache/Nginx) to serve the `public` directory

## 🔧 Configuration

### Environment Variables
Key environment variables in `.env`:
- `APP_NAME` - Application name
- `APP_ENV` - Environment (local, production)
- `APP_DEBUG` - Debug mode
- `DB_CONNECTION` - Database connection (sqlite, mysql, pgsql)

### Customization
- **Images**: Replace images in `public/images/` directory
- **Styling**: Modify `resources/css/app.css` for custom styles
- **Content**: Update Blade templates in `resources/views/pages/`
- **Components**: Modify Livewire components in `app/Livewire/`

## 📞 Contact & Support

For questions about this website or Danny V Carpentry services, please visit the contact page or reach out through the business contact information.

## 📝 License

This project is proprietary software developed for Danny V Carpentry.

---

**Built with ❤️ using Laravel, Livewire, and Tailwind CSS**