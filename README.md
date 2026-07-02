# Stitch & Fiber

A premium Laravel-based artisan studio web application for boutique fiber crafts. Stitch & Fiber showcases handmade products, provides an intuitive shopping experience, and connects craft enthusiasts with artisanal creators.

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-4.0-38B2AC?style=flat-square&logo=tailwind-css)

## 🧵 About

Stitch & Fiber is a boutique e-commerce platform designed specifically for fiber crafts and artisanal textiles. The application emphasizes the slow-craft movement and celebrates high-end textile artistry through a carefully crafted digital experience.

### Core Features

- **Product Showcase**: Browse and discover handmade fiber craft products with rich imagery and detailed descriptions
- **Shopping Cart & Checkout**: Seamless checkout experience with secure payment processing
- **Contact & Engagement**: Multiple ways for customers to get in touch with the artisan studio
- **Newsletter**: Build community through email subscriptions and updates
- **Admin Dashboard**: Manage products, orders, and customer interactions
- **Responsive Design**: Optimized for both desktop and mobile devices

## 🎨 Design Philosophy

Stitch & Fiber reflects a **calm, artisanal, and premium** brand personality. The design system is built around natural inspiration—drawing from organic materials and the tactile experience of working with high-quality fibers.

### Visual Identity

- **Color Palette**: Sage green primary, warm terracotta accents, with an oatmeal background
- **Typography**: Playfair Display for headings, Montserrat for body text
- **Spacing & Layout**: Generous whitespace, 12-column desktop grid, 4-column mobile grid
- **Depth**: Soft, diffused shadows rather than harsh elevation effects

For complete design system specifications, see [DESIGN.md](./DESIGN.md).

## 🛠️ Tech Stack

### Backend
- **Framework**: Laravel 12.0
- **Language**: PHP 8.2+
- **Database**: SQLite (development) / Your preferred database
- **ORM**: Eloquent

### Frontend
- **Build Tool**: Vite
- **CSS Framework**: Tailwind CSS 4.0
- **Language**: Blade templating engine
- **Package Manager**: npm

### Development Tools
- **Testing**: PHPUnit
- **Code Quality**: Pint (PHP linter)
- **Development**: Laravel Sail, Concurrently for parallel task running

## 🚀 Getting Started

### Prerequisites

- PHP 8.2 or higher
- Node.js and npm
- Composer
- SQLite (or your database of choice)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Temirt/stitch-and-fiber.git
   cd stitch-and-fiber
   ```

2. **Run the setup script**
   ```bash
   composer run setup
   ```

   This automatically handles:
   - Installing PHP dependencies
   - Creating `.env` file from `.env.example`
   - Generating application key
   - Running database migrations
   - Installing npm dependencies
   - Building frontend assets

### Development

Start the development server with all processes running concurrently:

```bash
composer run dev
```

This starts:
- Laravel development server (port 8000)
- Queue listener
- Log viewer (Pail)
- Vite development server

### Building for Production

```bash
npm run build
```

## 📁 Project Structure

```
stitch-and-fiber/
├── app/                 # Application code
├── bootstrap/           # Framework bootstrap files
├── config/              # Configuration files
├── database/            # Database migrations and seeders
├── public/              # Web server public directory
├── resources/           # Views, CSS, and JavaScript
├── routes/              # Application routes
├── storage/             # Generated files and logs
├── tests/               # Test suite
├── artisan              # Laravel CLI
├── composer.json        # PHP dependencies
├── package.json         # Node.js dependencies
├── phpunit.xml          # PHPUnit configuration
├── vite.config.js       # Vite configuration
└── DESIGN.md            # Design system documentation
```

## 🧪 Testing

Run the test suite:

```bash
composer run test
```

This clears the config cache and runs PHPUnit with your configured test cases.

## 🔧 Configuration

### Environment Variables

Copy `.env.example` to `.env` and update the following as needed:

```env
APP_NAME=Stitch & Fiber
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
# ... other database config
```

See `.env.example` for a complete list of configuration options.

## 📦 Key Dependencies

### PHP
- `laravel/framework` - The Laravel framework
- `laravel/tinker` - REPL for Laravel
- `myclabs/deep-copy` - Deep cloning utility

### JavaScript
- `laravel-vite-plugin` - Laravel integration with Vite
- `tailwindcss` - Utility-first CSS framework
- `axios` - HTTP client for making requests

## 🎯 Development Workflow

### Making Changes

1. Create a feature branch
2. Make your changes
3. Run tests: `composer run test`
4. Commit with clear messages
5. Push and create a pull request

### Code Standards

- PHP code is linted with Pint
- Follow Laravel conventions
- Maintain the design system for UI components
- Write tests for new features

## 🌐 Deployment

The project is configured for easy deployment:

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Generate optimized autoloader: `composer install --optimize-autoloader --no-dev`
4. Build frontend assets: `npm run build`
5. Run migrations: `php artisan migrate --force`

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a pull request.

## 📞 Contact

For questions about Stitch & Fiber, please visit the project repository or reach out through the contact form on the website.

---

**Built with ❤️ for the artisan fiber craft community**
