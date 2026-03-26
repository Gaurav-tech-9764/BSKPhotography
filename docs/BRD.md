# Business Requirements Document (BRD)

## Project: BSK Photography Portfolio Website

---

## 1. Business Overview

This project involves developing a professional Photography Portfolio Website for BSK Photography. The application will serve as a digital showcase for the photographer's work, enabling content management, client interactions, and service promotion.

**Business Problem:** The photographer needs a centralized, professional online presence to showcase their portfolio, manage photography categories, promote services, handle client inquiries, and manage events — all through an easy-to-use admin panel.

**System Objective:** Build a responsive, SEO-friendly, production-ready photography portfolio website with a powerful admin CMS using PHP Laravel, Bootstrap, and MySQL.

---

## 2. Stakeholders

| Stakeholder | Role | Description |
|-------------|------|-------------|
| Admin (Owner) | Primary User | Manages all website content, images, services, settings, and inquiries |
| Visitor (Customer) | End User | Browses portfolio, views services, reads about the photographer, and submits contact inquiries |

---

## 3. Functional Requirements

### Authentication Module
| ID | Requirement |
|----|-------------|
| FR-01 | Admin can log in using email and password |
| FR-02 | Admin can log out securely |
| FR-03 | Authentication uses secure session-based mechanism |
| FR-04 | Password reset functionality |

### Dashboard Module
| ID | Requirement |
|----|-------------|
| FR-05 | Admin can view website statistics overview (total images, categories, inquiries, services) |
| FR-06 | Quick access navigation to all modules |

### Category Management Module
| ID | Requirement |
|----|-------------|
| FR-07 | Admin can create new photography categories |
| FR-08 | Admin can update existing categories |
| FR-09 | Admin can delete categories |
| FR-10 | Support multiple photography types (Wedding, Events, Fashion, Wildlife, Portrait, Landscape, etc.) |
| FR-11 | Categories can have a cover image and description |

### Portfolio Management Module
| ID | Requirement |
|----|-------------|
| FR-12 | Admin can upload multiple images |
| FR-13 | Admin can assign images to categories |
| FR-14 | Admin can edit image details (caption, description) |
| FR-15 | Admin can delete images |
| FR-16 | Images support captions and descriptions |
| FR-17 | Gallery supports filtering by category |
| FR-18 | Lightbox view for full-size image viewing |

### Events Module
| ID | Requirement |
|----|-------------|
| FR-19 | Admin can create events with details (title, date, location, description) |
| FR-20 | Admin can upload event-specific photos |
| FR-21 | Admin can edit and delete events |
| FR-22 | Visitors can browse events and event galleries |

### Services Module
| ID | Requirement |
|----|-------------|
| FR-23 | Admin can add services with title, description, and sample images |
| FR-24 | Admin can edit and delete services |
| FR-25 | Admin can optionally add pricing to services |
| FR-26 | Visitors can browse available photography services |

### About Us Page
| ID | Requirement |
|----|-------------|
| FR-27 | Admin can manage photographer bio |
| FR-28 | Admin can update experience, achievements, and story |
| FR-29 | Visitors can view the about us page |

### Contact Us Module
| ID | Requirement |
|----|-------------|
| FR-30 | Visitors can submit inquiries via a contact form |
| FR-31 | Inquiries are stored in the database |
| FR-32 | Email notification sent to owner on new inquiry |
| FR-33 | Admin can view and manage inquiries |

### Social Media Integration
| ID | Requirement |
|----|-------------|
| FR-34 | Admin can add and manage social media links |
| FR-35 | Social media icons displayed on website (Instagram, Facebook, Twitter, YouTube, etc.) |

### CMS (Content Management System)
| ID | Requirement |
|----|-------------|
| FR-36 | Admin can manage homepage banners/sliders |
| FR-37 | Admin can update text content dynamically |
| FR-38 | Admin can manage site-wide settings (site name, logo, favicon, footer text) |

### Testimonials Module
| ID | Requirement |
|----|-------------|
| FR-39 | Admin can add, edit, and delete client testimonials |
| FR-40 | Testimonials displayed on homepage/dedicated section |

### Blog/Stories Section
| ID | Requirement |
|----|-------------|
| FR-41 | Admin can create, edit, and delete blog posts |
| FR-42 | Blog posts support images and rich text |
| FR-43 | Visitors can read blog posts |

---

## 4. Non-Functional Requirements

| ID | Category | Requirement |
|----|----------|-------------|
| NFR-01 | Performance | Fast loading images with optimization and lazy loading |
| NFR-02 | Performance | Page load time under 3 seconds |
| NFR-03 | Security | Secure admin login with CSRF protection |
| NFR-04 | Security | Data protection and input sanitization |
| NFR-05 | Security | Download protection for portfolio images |
| NFR-06 | Scalability | Ability to handle large volumes of image data |
| NFR-07 | Usability | Simple, intuitive UI for both admin and visitors |
| NFR-08 | Usability | Responsive design (mobile-friendly) |
| NFR-09 | SEO | SEO-friendly URLs and meta tags |
| NFR-10 | Reliability | 99.9% uptime target |
| NFR-11 | Maintainability | Clean code architecture, separation of concerns |

---

## 5. Use Cases

### UC-01: Admin Login
- **Actor:** Admin
- **Basic Flow:**
  1. Admin navigates to login page
  2. Admin enters email and password
  3. System validates credentials
  4. System redirects to dashboard

### UC-02: Manage Portfolio
- **Actor:** Admin
- **Basic Flow:**
  1. Admin logs into admin panel
  2. Admin navigates to portfolio management
  3. Admin uploads images and assigns categories
  4. Admin adds captions/descriptions
  5. System saves and displays images in gallery

### UC-03: Browse Gallery
- **Actor:** Visitor
- **Basic Flow:**
  1. Visitor opens portfolio page
  2. Visitor sees all images with category filters
  3. Visitor clicks on an image
  4. System opens lightbox view with full-size image

### UC-04: Submit Inquiry
- **Actor:** Visitor
- **Basic Flow:**
  1. Visitor navigates to contact page
  2. Visitor fills in name, email, subject, message
  3. Visitor submits the form
  4. System stores inquiry and sends email notification to admin

### UC-05: Manage Services
- **Actor:** Admin
- **Basic Flow:**
  1. Admin navigates to services module
  2. Admin adds new service with details and sample images
  3. System saves and publishes on website

---

## 6. Scope

### In Scope
- Authentication (Admin login/logout)
- Admin Dashboard with statistics
- Category Management (CRUD)
- Portfolio Management (CRUD with image upload)
- Events Module (CRUD with gallery)
- Services Module (CRUD with optional pricing)
- About Us Page Management
- Contact Us with form and email notification
- Social Media Links Management
- CMS (Banners, dynamic content, site settings)
- Testimonials Module
- Blog/Stories Section
- Responsive design with Bootstrap
- Image optimization and lazy loading
- SEO-friendly URLs
- Lightbox gallery view
- Download protection

### Out of Scope (Future Enhancements)
- Online booking system
- Payment integration
- Client gallery with login access
- AI-based photo tagging
- Watermarking images

---

## 7. Technology Stack

| Component | Technology |
|-----------|-----------|
| Backend | PHP Laravel |
| Frontend | HTML, CSS, JavaScript, Bootstrap 5 |
| Template Engine | Laravel Blade |
| Database | MySQL |
| Image Storage | Local filesystem (storage/app/public) |
| Authentication | Laravel built-in auth |
| Email | Laravel Mail (SMTP) |

---

## 8. Admin Configuration (Master Settings)

- Manage categories and images
- Update services and pricing
- Modify About Us content
- Manage contact details
- Update social media links
- Configure homepage content (banners, text)
- Manage site settings (name, logo, favicon, footer)
