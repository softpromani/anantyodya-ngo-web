# Anantyodya Welfare Foundation — Laravel + Inertia.js (Vue 3)

A single, unified full-stack application built with **Laravel 12**, **Inertia.js v2**, and **Vue 3**.

---

## 🏛️ Single-App Architecture

Unlike setups that require two separate servers (e.g. Node.js for Nuxt + PHP for Laravel), this application is **hosted and deployed as a single Laravel application**:

```
anantyodya-website/
├── app/
│   ├── Http/Controllers/
│   │   └── ContactController.php       # Handles contact form validation & DB storage
│   ├── Http/Middleware/
│   │   └── HandleInertiaRequests.php   # Inertia root view & shared session data
│   └── Models/
│       └── Contact.php                 # Eloquent model
├── database/
│   ├── migrations/                     # SQLite / MySQL schema
│   └── database.sqlite                 # Pre-configured SQLite database
├── resources/
│   ├── css/
│   │   └── style.css                   # Custom brand styling & design tokens
│   ├── js/
│   │   ├── app.js                      # Inertia Vue 3 entry point
│   │   ├── Components/
│   │   │   ├── TheNavbar.vue           # Header with mobile menu & sticky scroll
│   │   │   ├── TheFooter.vue           # Footer with statutory details & navigation
│   │   │   ├── ScrollProgress.vue      # Top scroll progress bar
│   │   │   └── TickerBanner.vue        # Infinite marquee banner
│   │   ├── Composables/
│   │   │   └── useAppInteractions.js   # Scroll reveals, animated counters, 3D tilt
│   │   ├── Layouts/
│   │   │   └── DefaultLayout.vue       # Main responsive layout wrapper
│   │   └── Pages/                      # Vue 3 pages rendered via Inertia
│   │       ├── Index.vue               # Home page
│   │       ├── About.vue               # About page & legal objects
│   │       ├── Programs.vue            # Five pillars & programmes
│   │       ├── Governance.vue          # MCA records, CIN, Section 8, directors
│   │       ├── Gallery.vue             # Image gallery
│   │       ├── GetInvolved.vue         # Volunteer & CSR info
│   │       └── Contact.vue             # Interactive contact form (native Inertia useForm)
│   └── views/
│       └── app.blade.php               # Single HTML root template for Inertia
├── routes/
│   └── web.php                         # All web routes returning Inertia pages
├── public/                             # Public static assets & Vite builds
│   ├── assets/img/logo.png
│   └── build/                          # Production compiled Vue assets
├── vite.config.js                      # Vite config with Laravel & Vue 3 plugins
├── start-dev.bat                       # One-click Windows dev launcher
└── package.json                        # Vue 3, Inertia, Vite
```

---

## 🚀 Running the Application

### 1. Requirements
- **PHP** >= 8.2 (with `pdo_sqlite` or MySQL enabled)
- **Composer**
- **Node.js** >= 18+ and **npm**

---

### 2. Start Development (One-Click)
Double-click:
```bash
start-dev.bat
```
Or run in two terminals:
```bash
# Terminal 1: Laravel backend server
php artisan serve

# Terminal 2: Vite hot-reload dev server
npm run dev
```
Open **`http://127.0.0.1:8000`** in your browser.

---

### 3. Production Deployment (Single Server)
In production, you only need standard PHP hosting (Apache, Nginx, cPanel, Forge, etc.):
```bash
# 1. Compile Vue assets into public/build
npm run build

# 2. Run migrations
php artisan migrate --force

# 3. Cache configuration and routes
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
**No Node.js server needs to run in production!** Laravel serves the compiled Vue 3 Single Page Application directly.

---

## 📄 Routes & Page Mapping

| Route | Controller / Handler | Vue 3 Component | Description |
|---|---|---|---|
| `GET /` | `Inertia::render('Index')` | `Pages/Index.vue` | Homepage with hero, pillars & counters |
| `GET /about` | `Inertia::render('About')` | `Pages/About.vue` | Story, legal mandate & leadership |
| `GET /programs` | `Inertia::render('Programs')` | `Pages/Programs.vue` | Detailed breakdown of the 5 pillars |
| `GET /governance` | `Inertia::render('Governance')` | `Pages/Governance.vue` | MCA filings, CIN, Section 8, PAN |
| `GET /gallery` | `Inertia::render('Gallery')` | `Pages/Gallery.vue` | Representative field photos |
| `GET /get-involved` | `Inertia::render('GetInvolved')` | `Pages/GetInvolved.vue` | Volunteering & CSR partnerships |
| `GET /contact` | `ContactController@create` | `Pages/Contact.vue` | Contact page & interactive form |
| `POST /contact` | `ContactController@store` | — | Stores submission into SQLite database |

---

## 💡 Benefits of this Setup
- **Single application**: 1 repo, 1 domain, 1 deployment pipeline.
- **True SPA Speed**: Instant page changes with Inertia client-side transitions (no browser reload).
- **Zero CORS / CSRF Hassles**: Inertia seamlessly handles Laravel's CSRF token protection automatically.
- **Form State**: Form inputs, loading states (`form.processing`), and validation errors (`form.errors`) are handled automatically with Vue 3 reactivity.
