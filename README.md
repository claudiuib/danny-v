# Danny V Carpentry Website

A modern, responsive website for Danny V Carpentry, a London-based carpentry business specializing in quality craftsmanship and reliable service. Features a comprehensive admin panel for dynamic content management.

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
- **Backpack for Laravel** - Admin panel and CRUD operations
- **MySQL** - Database management

### Frontend
- **Tailwind CSS 4.1** - Utility-first CSS framework
- **Flowbite 3.1** - Component library
- **Vite 7.0** - Build tool and development server
- **Axios 1.11** - HTTP client
- **Chart.js** - Analytics and visitor statistics

### Development Tools
- **Laravel Pint** - Code style fixer
- **PHPUnit 11.5** - Testing framework
- **Laravel Pail** - Log viewer
- **Concurrently** - Run multiple commands simultaneously

## 📁 Project Structure

```
danny-v/
├── app/
│   ├── Http/Controllers/     # Page controllers and Admin CRUD controllers
│   ├── Http/Middleware/       # Custom middleware (TrackVisitors, CheckIfAdmin)
│   ├── Http/Requests/         # Form validation requests
│   ├── Livewire/            # Dynamic components (Header, Footer, HeroCarousel)
│   ├── Models/              # Eloquent models (User, Portfolio, Service, etc.)
│   └── Providers/           # Service providers
├── resources/
│   ├── css/                 # Tailwind CSS styles
│   ├── js/                  # JavaScript files
│   └── views/
│       ├── admin/           # Admin panel custom views
│       ├── components/      # Blade components
│       ├── livewire/        # Livewire component views
│       ├── pages/           # Page templates (home, about, services, portfolio, contact)
│       └── vendor/          # Backpack admin views
├── public/
│   ├── images/              # Static images (carousel, gallery, logo)
│   ├── storage/             # Uploaded files and images
│   └── build/               # Compiled assets
├── database/                # MySQL database and migrations
├── routes/
│   ├── web.php              # Public routes
│   └── backpack/            # Admin panel routes
└── config/backpack/         # Backpack configuration
```

## 🛠️ Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL (recommended) or SQLite
- Backpack for Laravel

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
   # Configure MySQL in .env file
   php artisan migrate
   php artisan storage:link
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

## 🔧 Admin Panel Features

### CRUD Operations
- **Portfolio Management** - Add, edit, and organize portfolio items with images
- **Services Management** - Manage service offerings with features and descriptions
- **Contact Information** - Update contact details, phone, email, and location
- **Main Page Content** - Manage homepage content and services list
- **About Page Content** - Manage company story and history
- **User Management** - Admin user controls with password management
- **Visitor Analytics** - Website statistics, charts, and visitor tracking

### Admin Panel Features
- **Custom Dashboard** - Comprehensive overview with statistics and quick actions
- **Image Upload** - High-quality image management for portfolio and services
- **Content Management** - Dynamic content for all pages
- **Visitor Tracking** - Privacy-focused analytics with location data
- **Security Features** - User protection and password requirements
- **Responsive Design** - Mobile-friendly admin interface

## 🎨 Styling & Assets

- **Tailwind CSS** for utility-first styling
- **Flowbite** components for UI elements
- **Italiana font** from Google Fonts for headings
- **Responsive design** optimized for mobile and desktop
- **Image optimization** with proper alt tags and responsive sizing

## 🗄️ Database

The project uses MySQL with the following tables:

### Core Tables
- `users` - User authentication and admin accounts
- `cache` - Application cache
- `jobs` - Queue jobs

### Content Management Tables
- `portfolios` - Portfolio items with images and categories
- `services` - Service offerings with features and descriptions
- `contact_infos` - Contact information and location details
- `main_page_contents` - Homepage content and services list
- `about_page_contents` - About page content and company story
- `visitors` - Visitor tracking and analytics data

### Database Features
- **Automatic Sort Ordering** - Content items are automatically ordered
- **Image Management** - File uploads stored in `public/storage`
- **Visitor Tracking** - Privacy-focused analytics without IP storage
- **Content Status** - Active/inactive toggles for all content

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
- **Content**: Update content through admin panel at `/admin`
- **Admin Panel**: Customize admin views in `resources/views/admin/`
- **Components**: Modify Livewire components in `app/Livewire/`

### Admin Panel Access
- **URL**: `http://your-domain.com/admin`
- **Features**: Complete content management system
- **Security**: User authentication and role-based access
- **Dashboard**: Real-time statistics and quick actions

## 📞 Contact & Support

For questions about this website or Danny V Carpentry services, please visit the contact page or reach out through the business contact information.

## 📝 License

This project is proprietary software developed for Danny V Carpentry.

---

**Built with ❤️ using Laravel, Livewire, Tailwind CSS, and Backpack for Laravel**

## 🚀 Key Features

- ✅ **Dynamic Content Management** - All content manageable through admin panel
- ✅ **Image Upload System** - High-quality image management for portfolio and services
- ✅ **Visitor Analytics** - Privacy-focused visitor tracking with charts
- ✅ **Responsive Design** - Mobile-friendly website and admin interface
- ✅ **Security Features** - User authentication and content protection
- ✅ **SEO Optimized** - Clean URLs and meta tags
- ✅ **Performance Optimized** - Fast loading with efficient database queries