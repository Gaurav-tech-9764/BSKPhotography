# Low-Level Design (LLD)

## Project: BSK Photography Portfolio Website

---

## 1. Entity Design

### 1.1 Users
```
users
├── id (bigint, PK, auto-increment)
├── name (varchar 255)
├── email (varchar 255, unique)
├── password (varchar 255, hashed)
├── remember_token (varchar 100, nullable)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.2 Categories
```
categories
├── id (bigint, PK, auto-increment)
├── name (varchar 255)
├── slug (varchar 255, unique)
├── description (text, nullable)
├── cover_image (varchar 255, nullable)
├── is_active (boolean, default true)
├── sort_order (int, default 0)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.3 Portfolio Images
```
portfolio_images
├── id (bigint, PK, auto-increment)
├── category_id (bigint, FK → categories.id)
├── title (varchar 255, nullable)
├── description (text, nullable)
├── image_path (varchar 255)
├── thumbnail_path (varchar 255, nullable)
├── is_featured (boolean, default false)
├── sort_order (int, default 0)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.4 Events
```
events
├── id (bigint, PK, auto-increment)
├── title (varchar 255)
├── slug (varchar 255, unique)
├── description (text, nullable)
├── event_date (date, nullable)
├── location (varchar 255, nullable)
├── cover_image (varchar 255, nullable)
├── is_active (boolean, default true)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.5 Event Images
```
event_images
├── id (bigint, PK, auto-increment)
├── event_id (bigint, FK → events.id)
├── image_path (varchar 255)
├── caption (varchar 255, nullable)
├── sort_order (int, default 0)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.6 Services
```
services
├── id (bigint, PK, auto-increment)
├── title (varchar 255)
├── slug (varchar 255, unique)
├── description (text, nullable)
├── price (decimal 10,2, nullable)
├── price_label (varchar 255, nullable) e.g. "Starting from"
├── image (varchar 255, nullable)
├── is_active (boolean, default true)
├── sort_order (int, default 0)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.7 About
```
abouts
├── id (bigint, PK, auto-increment)
├── title (varchar 255, nullable)
├── content (longtext, nullable)
├── image (varchar 255, nullable)
├── experience (varchar 255, nullable)
├── achievements (text, nullable)
├── story (longtext, nullable)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.8 Contact Inquiries
```
contact_inquiries
├── id (bigint, PK, auto-increment)
├── name (varchar 255)
├── email (varchar 255)
├── phone (varchar 20, nullable)
├── subject (varchar 255, nullable)
├── message (text)
├── is_read (boolean, default false)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.9 Social Links
```
social_links
├── id (bigint, PK, auto-increment)
├── platform (varchar 255)
├── url (varchar 500)
├── icon (varchar 255)
├── sort_order (int, default 0)
├── is_active (boolean, default true)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.10 Banners
```
banners
├── id (bigint, PK, auto-increment)
├── title (varchar 255, nullable)
├── subtitle (varchar 255, nullable)
├── image (varchar 255)
├── link (varchar 500, nullable)
├── is_active (boolean, default true)
├── sort_order (int, default 0)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.11 Settings
```
settings
├── id (bigint, PK, auto-increment)
├── key (varchar 255, unique)
├── value (longtext, nullable)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.12 Testimonials
```
testimonials
├── id (bigint, PK, auto-increment)
├── client_name (varchar 255)
├── client_designation (varchar 255, nullable)
├── client_image (varchar 255, nullable)
├── content (text)
├── rating (tinyint, nullable) 1-5
├── is_active (boolean, default true)
├── sort_order (int, default 0)
├── created_at (timestamp)
└── updated_at (timestamp)
```

### 1.13 Blog Posts
```
blog_posts
├── id (bigint, PK, auto-increment)
├── title (varchar 255)
├── slug (varchar 255, unique)
├── excerpt (text, nullable)
├── content (longtext)
├── featured_image (varchar 255, nullable)
├── is_published (boolean, default false)
├── published_at (timestamp, nullable)
├── created_at (timestamp)
└── updated_at (timestamp)
```

---

## 2. Eloquent Model Relationships

```
User (no relationships needed - single admin)

Category hasMany PortfolioImage
PortfolioImage belongsTo Category

Event hasMany EventImage
EventImage belongsTo Event
```

---

## 3. API Endpoints (Full Detail)

### 3.1 Public Endpoints

#### Homepage
```
GET /
Controller: App\Http\Controllers\HomeController@index
Response: View with banners, featured portfolio, testimonials, services
```

#### Portfolio
```
GET /portfolio
Controller: App\Http\Controllers\PortfolioController@index
Query Params: ?category={slug}
Response: View with gallery images, category filter tabs

GET /portfolio/{category:slug}
Controller: App\Http\Controllers\PortfolioController@category
Response: View with category-specific images
```

#### Services
```
GET /services
Controller: App\Http\Controllers\ServiceController@index
Response: View with all active services
```

#### Events
```
GET /events
Controller: App\Http\Controllers\EventController@index
Response: View with all events

GET /events/{event:slug}
Controller: App\Http\Controllers\EventController@show
Response: View with event details and gallery
```

#### About
```
GET /about
Controller: App\Http\Controllers\AboutController@index
Response: View with photographer bio
```

#### Contact
```
GET /contact
Controller: App\Http\Controllers\ContactController@index
Response: View with contact form

POST /contact
Controller: App\Http\Controllers\ContactController@store
Request Body: name, email, phone, subject, message
Validation: name required, email required|email, message required
Response: Redirect with success message
```

#### Blog
```
GET /blog
Controller: App\Http\Controllers\BlogController@index
Response: View with blog listing

GET /blog/{post:slug}
Controller: App\Http\Controllers\BlogController@show
Response: View with blog post detail
```

### 3.2 Admin Endpoints (prefix: /admin, middleware: auth)

#### Authentication
```
GET /login
POST /login
POST /logout
```

#### Dashboard
```
GET /admin/dashboard
Controller: App\Http\Controllers\Admin\DashboardController@index
```

#### Categories (Resource)
```
GET    /admin/categories              → index
GET    /admin/categories/create       → create
POST   /admin/categories              → store
GET    /admin/categories/{id}/edit    → edit
PUT    /admin/categories/{id}         → update
DELETE /admin/categories/{id}         → destroy
```

#### Portfolio (Resource)
```
GET    /admin/portfolio               → index
GET    /admin/portfolio/create        → create
POST   /admin/portfolio               → store
GET    /admin/portfolio/{id}/edit     → edit
PUT    /admin/portfolio/{id}          → update
DELETE /admin/portfolio/{id}          → destroy
```

#### Events (Resource)
```
GET    /admin/events                  → index
GET    /admin/events/create           → create
POST   /admin/events                  → store
GET    /admin/events/{id}/edit        → edit
PUT    /admin/events/{id}             → update
DELETE /admin/events/{id}             → destroy
```

#### Services (Resource)
```
GET    /admin/services                → index
GET    /admin/services/create         → create
POST   /admin/services                → store
GET    /admin/services/{id}/edit      → edit
PUT    /admin/services/{id}           → update
DELETE /admin/services/{id}           → destroy
```

#### About
```
GET  /admin/about    → edit
POST /admin/about    → update
```

#### Testimonials (Resource)
```
GET    /admin/testimonials              → index
GET    /admin/testimonials/create       → create
POST   /admin/testimonials              → store
GET    /admin/testimonials/{id}/edit    → edit
PUT    /admin/testimonials/{id}         → update
DELETE /admin/testimonials/{id}         → destroy
```

#### Blog (Resource)
```
GET    /admin/blog                  → index
GET    /admin/blog/create           → create
POST   /admin/blog                  → store
GET    /admin/blog/{id}/edit        → edit
PUT    /admin/blog/{id}             → update
DELETE /admin/blog/{id}             → destroy
```

#### Inquiries
```
GET    /admin/inquiries             → index
GET    /admin/inquiries/{id}        → show
DELETE /admin/inquiries/{id}        → destroy
PATCH  /admin/inquiries/{id}/read   → markAsRead
```

#### Social Links (Resource)
```
GET    /admin/social-links              → index
GET    /admin/social-links/create       → create
POST   /admin/social-links              → store
GET    /admin/social-links/{id}/edit    → edit
PUT    /admin/social-links/{id}         → update
DELETE /admin/social-links/{id}         → destroy
```

#### Banners (Resource)
```
GET    /admin/banners              → index
GET    /admin/banners/create       → create
POST   /admin/banners              → store
GET    /admin/banners/{id}/edit    → edit
PUT    /admin/banners/{id}         → update
DELETE /admin/banners/{id}         → destroy
```

#### Settings
```
GET  /admin/settings    → edit
POST /admin/settings    → update
```

---

## 4. Service Layer Logic

### ImageService
- `upload(file, directory)` — Store image, generate thumbnail
- `delete(path)` — Remove image from storage
- `optimize(path)` — Compress image for web

### SettingService
- `get(key, default)` — Retrieve setting value
- `set(key, value)` — Store or update setting
- `getAll()` — Get all settings as key-value array

---

## 5. Middleware

| Middleware | Purpose |
|-----------|---------|
| `auth` | Protects admin routes |
| `VerifyCsrfToken` | CSRF protection on forms |
| `TrimStrings` | Trims input whitespace |
| `ValidatePostSize` | Prevents oversized uploads |

---

## 6. Validation Rules

### Contact Form
```php
'name' => 'required|string|max:255',
'email' => 'required|email|max:255',
'phone' => 'nullable|string|max:20',
'subject' => 'nullable|string|max:255',
'message' => 'required|string|max:2000',
```

### Category
```php
'name' => 'required|string|max:255',
'description' => 'nullable|string',
'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
'is_active' => 'boolean',
```

### Portfolio Image
```php
'category_id' => 'required|exists:categories,id',
'title' => 'nullable|string|max:255',
'description' => 'nullable|string',
'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
```

### Event
```php
'title' => 'required|string|max:255',
'description' => 'nullable|string',
'event_date' => 'nullable|date',
'location' => 'nullable|string|max:255',
'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
```

### Service
```php
'title' => 'required|string|max:255',
'description' => 'nullable|string',
'price' => 'nullable|numeric|min:0',
'price_label' => 'nullable|string|max:255',
'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
```

### Banner
```php
'title' => 'nullable|string|max:255',
'subtitle' => 'nullable|string|max:255',
'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
'link' => 'nullable|url|max:500',
```

### Testimonial
```php
'client_name' => 'required|string|max:255',
'client_designation' => 'nullable|string|max:255',
'client_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
'content' => 'required|string',
'rating' => 'nullable|integer|min:1|max:5',
```

### Blog Post
```php
'title' => 'required|string|max:255',
'excerpt' => 'nullable|string',
'content' => 'required|string',
'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
'is_published' => 'boolean',
```
