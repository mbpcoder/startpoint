<div align="center">

# Startpoint

**A multilingual blog platform and support system built for the modern web.**

[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Filament](https://img.shields.io/badge/Filament-5-F59E0B?style=flat-square)](https://filamentphp.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-22C55E?style=flat-square)](LICENSE)

*Publish in Farsi. Reach readers in Arabic. Welcome the world in English.*

</div>

---

## What Is Startpoint?

Startpoint is a **production-ready, multilingual content platform** that combines a full-featured blog engine with a built-in customer support ticketing system. It was designed from the ground up to serve audiences that read right-to-left — Persian and Arabic — while remaining equally polished in left-to-right languages like English.

Unlike generic CMS solutions bolted together from plugins, every layer of Startpoint — routing, UI, admin panel, language switching — was architected as a cohesive whole. You get SEO-friendly localized URLs (`/en/posts/...`, `/ar/posts/...`), automatic RTL/LTR layout switching, a cookie-and-database-backed language preference system, and a beautiful Filament 5 admin panel, all without a single line of client-side JavaScript in the public frontend.

---

## Key Features

### Content & Publishing
- **Blog engine** with rich post editor, categories, and meta fields (title, description, keywords)
- **Reading time** estimates automatically calculated from post content
- **Visit counter** per post with lightweight tracking
- **Related posts** surfaced by category
- **XML sitemap** auto-generated for all published posts
- **Soft deletes** across all content — nothing is permanently lost

### Community & Engagement
- **Comment system** with moderation queue — comments go live only after admin approval
- **Newsletter** — subscribe, manage members, compose and send campaigns
- **Full-text search** across post titles and body content

### Multilingual & RTL-First
- **Three languages out of the box**: Persian (fa), English (en), Arabic (ar)
- **RTL/LTR auto-switching** — `dir` and `lang` HTML attributes set dynamically per locale
- **SEO-friendly locale URLs** — `/en/...` and `/ar/...` prefixes for non-default locales; the default locale has no prefix
- **Language switcher** — zero JavaScript, pure link-based navigation
- **Layered locale resolution**: URL prefix → user preference (database) → cookie → app default
- **Configurable default locale** — set once in `config/app.php`, everything follows

### Support System
- **Ticket management** — users submit support requests; admins triage and respond
- **Ticket categories** — organize requests by topic (billing, technical, general, etc.)
- **Status tracking** — open / pending / closed with color-coded badges in the admin

### Admin Panel
- **Filament 5** — modern, fast, accessible admin UI at `/admin`
- **Post & category management** with rich text editor
- **Comment moderation** — approve or reject with one click
- **User management** — promote to admin, disable accounts
- **Newsletter composer** — write, preview, and track sends
- **Ticket inbox** — full support queue with filtering by status and category

### Developer Experience
- **Laravel 13** slim bootstrap — no legacy `Kernel.php` or `RouteServiceProvider`
- **Tailwind CSS v4** — utility-first, zero-config CSS
- **No JavaScript on the frontend** — server-rendered Blade, instant page loads, no hydration overhead
- **Anonymous migrations** — conflict-free across teams and forks
- **PHP 8.4 enums** — `Language` backed enum drives all locale logic (labels, direction, enablement)

---

## Tech Stack

| Layer | Technology |
|---|---|
| **Framework** | Laravel 13 |
| **Language** | PHP 8.4 |
| **Admin Panel** | Filament 5 |
| **Frontend** | Blade + Tailwind CSS v4 |
| **Build Tool** | Vite 6 |
| **Database** | MySQL / PostgreSQL |
| **Auth** | Laravel built-in (sessions) |
| **Queue** | Sync (upgradeable to Redis) |
| **Cache / Session** | File (upgradeable to Redis) |
| **Mail** | SMTP (configurable) |
| **Storage** | Local / AWS S3 |

---

## Getting Started

### Requirements

- PHP 8.4+
- Composer 2
- Node.js 20+ and pnpm
- MySQL 8+ or PostgreSQL 14+

### Installation

```bash
# 1. Clone and install dependencies
git clone https://github.com/mbpcoder/startpoint.git
cd startpoint
composer install
pnpm install

# 2. Environment setup
cp .env.example .env
php artisan key:generate

# 3. Configure your database in .env, then run migrations
php artisan migrate

# 4. Build frontend assets
pnpm run build

# 5. Start the development server
php artisan serve
```

### Set Your Default Language

Open `config/app.php` and set the locale you want as the no-prefix default:

```php
'locale' => 'fa',    // Persian — no URL prefix, RTL layout
// 'locale' => 'en', // English — no URL prefix, LTR layout
// 'locale' => 'ar', // Arabic  — no URL prefix, RTL layout
```

All other enabled languages are accessible via `/{locale}/...` URLs automatically.

### Create an Admin User

```bash
php artisan tinker
>>> \App\Models\User::create([
...     'name'     => 'Admin',
...     'username' => 'admin',
...     'email'    => 'admin@example.com',
...     'password' => bcrypt('your-password'),
...     'is_admin' => true,
... ]);
```

Then visit `/admin` to access the dashboard.

---

## Project Structure

```
app/
├── Enums/
│   ├── Language.php             # Backed enum — FA, EN, AR; RTL logic; labels
│   └── EnumOperationsTrait.php
├── Filament/Resources/          # Filament 5 admin resources (8 resources)
├── Helpers/helpers.php          # lroute(), locale_path(), clean_path()
├── Http/
│   ├── Controllers/             # Blog + auth + support controllers
│   └── Middleware/SetLocale.php
└── Models/                      # User, Post, Category, Comment,
                                 # Newsletter, NewsletterMember, Ticket, TicketCategory

lang/
├── fa.json / en.json / ar.json  # UI string translations
└── {locale}/enums.php           # Enum label translations per locale

routes/
├── web.php      # Auth routes + locale-grouped public route registration
└── public.php   # Shared public route definitions (included once per locale)

resources/views/
├── layouts/     # main.blade.php (public), app.blade.php (auth)
├── components/  # language-switcher, category-sidebar, post-card, ...
├── posts/
├── auth/
└── index.blade.php
```

---

## Multilingual Architecture

Startpoint uses a **route-group-per-locale** strategy. The file `routes/public.php` is a single shared route definition included once per enabled locale. The default locale group carries no URL prefix; all others get `/{locale}` prefix and a matching route name prefix.

```
GET /                     → home (default locale, e.g. fa)
GET /posts/my-article     → posts.show (default locale)
GET /en                   → en.home
GET /en/posts/my-article  → en.posts.show
GET /ar/posts/my-article  → ar.posts.show
```

The `lroute('posts.show', $id)` helper automatically picks the right named route based on the active locale — no manual locale-checking needed in views.

**Language preference is resolved in this order on every request:**

1. **URL prefix** — explicit, SEO-friendly, takes priority
2. **User database column** (`users.locale`) — persisted for logged-in users
3. **Cookie** (`locale`, 1-year) — persisted for guests
4. **`app.locale`** — the configured default

---

## Roadmap

- [ ] Tag-based filtering and tag pages
- [ ] Post scheduling (future `published_at`)
- [ ] RSS / Atom feed
- [ ] Email notifications for new comments
- [ ] API endpoints for headless / mobile clients
- [ ] Dark mode
- [ ] More locales (Urdu, Turkish, Kurdish)

---

## Contributing

Pull requests are welcome. For major changes, open an issue first to discuss what you'd like to change.

---

## License

MIT — free to use with attribution.
