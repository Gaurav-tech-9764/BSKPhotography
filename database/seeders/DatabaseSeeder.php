<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Category;
use App\Models\PortfolioImage;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Event;
use App\Models\EventImage;
use App\Models\Testimonial;
use App\Models\BlogPost;
use App\Models\About;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@bskphotography.com'],
            [
                'name' => 'BSK Admin',
                'password' => Hash::make('admin@123'),
            ]
        );

        // Default site settings
        $defaults = [
            'site_name' => 'BSK Photography',
            'site_tagline' => 'Capturing Moments That Last Forever',
            'site_email' => 'info@bskphotography.com',
            'site_phone' => '+91 9876543210',
            'site_address' => 'Mumbai, Maharashtra, India',
            'footer_text' => '© ' . date('Y') . ' BSK Photography. All Rights Reserved.',
            'meta_description' => 'BSK Photography - Professional photography services for weddings, events, portraits and more.',
            'meta_keywords' => 'photography, wedding photography, portrait, events, BSK Photography',
        ];

        foreach ($defaults as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }

        // Generate sample images and seed data
        $this->seedBanners();
        $this->seedCategories();
        $this->seedServices();
        $this->seedEvents();
        $this->seedTestimonials();
        $this->seedBlogPosts();
        $this->seedAbout();
        $this->seedSocialLinks();
    }

    private function generateImage(string $directory, string $label, int $width = 800, int $height = 600, string $bgColor = '#1a1a1a', string $accentColor = '#c9a96e'): string
    {
        Storage::disk('public')->makeDirectory($directory);

        $img = imagecreatetruecolor($width, $height);

        // Parse colors
        $bg = $this->hexToRgb($bgColor);
        $accent = $this->hexToRgb($accentColor);

        $bgAlloc = imagecolorallocate($img, $bg[0], $bg[1], $bg[2]);
        $accentAlloc = imagecolorallocate($img, $accent[0], $accent[1], $accent[2]);
        $white = imagecolorallocate($img, 255, 255, 255);
        $darkGray = imagecolorallocate($img, 40, 40, 40);

        // Fill background with gradient effect
        imagefill($img, 0, 0, $bgAlloc);

        // Add decorative elements
        // Diagonal lines for texture
        for ($i = -$height; $i < $width + $height; $i += 40) {
            imageline($img, $i, 0, $i + $height, $height, $darkGray);
        }

        // Center accent rectangle
        $rectW = (int)($width * 0.6);
        $rectH = (int)($height * 0.4);
        $rectX = ($width - $rectW) / 2;
        $rectY = ($height - $rectH) / 2;
        imagefilledrectangle($img, (int)$rectX, (int)$rectY, (int)($rectX + $rectW), (int)($rectY + $rectH), $accentAlloc);

        // Add border
        imagerectangle($img, (int)$rectX - 5, (int)$rectY - 5, (int)($rectX + $rectW + 5), (int)($rectY + $rectH + 5), $white);

        // Add text
        $fontSize = 5; // GD built-in font (largest)
        $textWidth = imagefontwidth($fontSize) * strlen($label);
        $textHeight = imagefontheight($fontSize);
        $textX = ($width - $textWidth) / 2;
        $textY = ($height - $textHeight) / 2;
        imagestring($img, $fontSize, (int)$textX, (int)$textY, $label, $bgAlloc);

        // Add "BSK Photography" watermark at bottom
        $watermark = 'BSK Photography';
        $wmWidth = imagefontwidth(3) * strlen($watermark);
        imagestring($img, 3, ($width - $wmWidth) / 2, $height - 30, $watermark, $accentAlloc);

        // Save image
        $filename = $directory . '/' . time() . '_' . Str::random(8) . '.jpg';
        $fullPath = Storage::disk('public')->path($filename);

        imagejpeg($img, $fullPath, 85);
        imagedestroy($img);

        // Small delay to ensure unique timestamps
        usleep(50000);

        return $filename;
    }

    private function generateThumbnail(string $sourcePath, string $directory): string
    {
        Storage::disk('public')->makeDirectory($directory . '/thumbnails');
        $fullSource = Storage::disk('public')->path($sourcePath);

        $srcInfo = getimagesize($fullSource);
        $srcImg = imagecreatefromjpeg($fullSource);
        $thumb = imagecreatetruecolor(400, 300);

        imagecopyresampled($thumb, $srcImg, 0, 0, 0, 0, 400, 300, $srcInfo[0], $srcInfo[1]);

        $thumbFile = $directory . '/thumbnails/' . basename($sourcePath);
        $thumbPath = Storage::disk('public')->path($thumbFile);
        imagejpeg($thumb, $thumbPath, 80);

        imagedestroy($srcImg);
        imagedestroy($thumb);

        return $thumbFile;
    }

    private function hexToRgb(string $hex): array
    {
        $hex = ltrim($hex, '#');
        return [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)),
        ];
    }

    private function seedBanners(): void
    {
        $banners = [
            ['title' => 'Capturing Life\'s Beautiful Moments', 'subtitle' => 'Professional Photography Services in Mumbai'],
            ['title' => 'Wedding Photography', 'subtitle' => 'Making Your Special Day Unforgettable'],
            ['title' => 'Portrait Sessions', 'subtitle' => 'Express Your True Self Through Our Lens'],
        ];

        foreach ($banners as $i => $data) {
            $image = $this->generateImage('banners', $data['title'], 1920, 800, '#0d0d0d', '#c9a96e');
            Banner::create([
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'image' => $image,
                'is_active' => true,
                'sort_order' => $i,
            ]);
        }
    }

    private function seedCategories(): void
    {
        $categories = [
            ['name' => 'Wedding Photography', 'description' => 'Beautiful moments from wedding celebrations captured with love and artistry.'],
            ['name' => 'Portrait Sessions', 'description' => 'Professional portrait photography for individuals, couples, and families.'],
            ['name' => 'Event Coverage', 'description' => 'Complete coverage of corporate events, parties, and special occasions.'],
            ['name' => 'Nature & Landscape', 'description' => 'Stunning landscape and nature photography from around the world.'],
            ['name' => 'Fashion & Editorial', 'description' => 'High-end fashion and editorial photography for brands and publications.'],
            ['name' => 'Product Photography', 'description' => 'Clean, professional product shots for e-commerce and advertising.'],
        ];

        $portfolioTitles = [
            'Wedding Photography' => ['The Grand Reception', 'Bridal Portrait', 'Ring Ceremony', 'First Dance', 'Wedding Decor', 'Couple Portraits'],
            'Portrait Sessions' => ['Corporate Headshot', 'Family Portrait', 'Graduation Photo', 'Maternity Shoot', 'Couple Session', 'Kids Portrait'],
            'Event Coverage' => ['Annual Gala', 'Product Launch', 'Conference Day', 'Birthday Celebration', 'Award Night', 'Team Outing'],
            'Nature & Landscape' => ['Mountain Sunrise', 'Ocean Waves', 'Forest Path', 'Desert Dunes', 'City Skyline', 'Waterfall'],
            'Fashion & Editorial' => ['Summer Collection', 'Urban Style', 'Runway Moments', 'Magazine Cover', 'Brand Campaign', 'Street Fashion'],
            'Product Photography' => ['Jewelry Collection', 'Watch Series', 'Food Styling', 'Perfume Bottle', 'Electronics', 'Clothing Flat Lay'],
        ];

        $colorSchemes = [
            ['#2c1810', '#d4a574'], // Warm brown
            ['#1a1a2e', '#e94560'], // Dark blue/red
            ['#0f3460', '#16c79a'], // Blue/green
            ['#1b1b2f', '#c9a96e'], // Dark/gold
            ['#2d132c', '#ee4540'], // Purple/red
            ['#1a1a1a', '#f0c040'], // Black/yellow
        ];

        foreach ($categories as $i => $catData) {
            $coverImage = $this->generateImage('categories', $catData['name'], 800, 600, $colorSchemes[$i][0], $colorSchemes[$i][1]);

            $category = Category::create([
                'name' => $catData['name'],
                'slug' => Str::slug($catData['name']),
                'description' => $catData['description'],
                'cover_image' => $coverImage,
                'is_active' => true,
                'sort_order' => $i,
            ]);

            // Create 6 portfolio images per category
            $titles = $portfolioTitles[$catData['name']];
            foreach ($titles as $j => $title) {
                $imgPath = $this->generateImage('portfolio', $title, 800, 600, $colorSchemes[$i][0], $colorSchemes[$i][1]);
                $thumbPath = $this->generateThumbnail($imgPath, 'portfolio');

                PortfolioImage::create([
                    'category_id' => $category->id,
                    'title' => $title,
                    'description' => 'A beautiful ' . strtolower($catData['name']) . ' photograph - ' . $title,
                    'image_path' => $imgPath,
                    'thumbnail_path' => $thumbPath,
                    'is_featured' => $j < 2, // First 2 in each category are featured
                    'sort_order' => $j,
                ]);
            }
        }
    }

    private function seedServices(): void
    {
        $services = [
            ['title' => 'Wedding Photography', 'description' => 'Complete wedding photography coverage including pre-wedding shoots, ceremony, reception and all special moments. We capture every emotion and detail to create timeless memories.', 'price' => 50000, 'price_label' => 'Starting from'],
            ['title' => 'Portrait Photography', 'description' => 'Professional portrait sessions for individuals, couples, and families. Studio or outdoor settings available with expert lighting and composition.', 'price' => 5000, 'price_label' => 'Per session'],
            ['title' => 'Event Coverage', 'description' => 'Full event photography for corporate events, birthday parties, anniversaries, and special occasions. Dedicated team ensures no moment is missed.', 'price' => 25000, 'price_label' => 'Starting from'],
            ['title' => 'Product Photography', 'description' => 'High-quality product photography for e-commerce, catalogs, and marketing materials. Clean backgrounds and creative compositions that sell.', 'price' => 3000, 'price_label' => 'Per product'],
            ['title' => 'Fashion & Editorial', 'description' => 'Professional fashion and editorial photography for designers, magazines, and lookbooks. Creative direction included.', 'price' => 35000, 'price_label' => 'Per shoot'],
            ['title' => 'Photo Editing & Retouching', 'description' => 'Professional post-processing, color correction, and retouching services. Transform your photos into magazine-quality images.', 'price' => 500, 'price_label' => 'Per photo'],
        ];

        $colors = [
            ['#2c1810', '#d4a574'],
            ['#1a1a2e', '#e94560'],
            ['#0f3460', '#16c79a'],
            ['#1b1b2f', '#c9a96e'],
            ['#2d132c', '#ee4540'],
            ['#1a1a1a', '#f0c040'],
        ];

        foreach ($services as $i => $data) {
            $image = $this->generateImage('services', $data['title'], 600, 400, $colors[$i][0], $colors[$i][1]);
            Service::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
                'price' => $data['price'],
                'price_label' => $data['price_label'],
                'image' => $image,
                'is_active' => true,
                'sort_order' => $i,
            ]);
        }
    }

    private function seedEvents(): void
    {
        $events = [
            ['title' => 'Sharma-Patel Wedding Celebration', 'description' => 'A grand celebration of love at The Taj Palace, Mumbai. Three days of wedding festivities including Mehendi, Sangeet, and the main wedding ceremony captured in stunning detail.', 'location' => 'The Taj Palace, Mumbai', 'event_date' => '2026-02-14'],
            ['title' => 'Annual Photography Exhibition 2026', 'description' => 'Our annual photography exhibition showcasing the best work from the past year. Over 50 photographs displayed in the prestigious Gallery One.', 'location' => 'Gallery One, Bandra', 'event_date' => '2026-01-20'],
            ['title' => 'Corporate Annual Day - TechCorp', 'description' => 'Complete coverage of TechCorp\'s annual day celebration featuring keynote speeches, awards ceremony, cultural performances, and networking dinner.', 'location' => 'Grand Hyatt, Mumbai', 'event_date' => '2026-03-10'],
            ['title' => 'Fashion Week Backstage', 'description' => 'Behind the scenes coverage of Mumbai Fashion Week including designer preparations, model fittings, and exclusive backstage moments.', 'location' => 'NSCI Dome, Mumbai', 'event_date' => '2026-03-01'],
        ];

        $colors = [
            ['#3d0c02', '#ff6b6b'],
            ['#0a1628', '#4ecdc4'],
            ['#1a1a2e', '#f39c12'],
            ['#2d132c', '#e94560'],
        ];

        foreach ($events as $i => $data) {
            $cover = $this->generateImage('events', $data['title'], 1200, 700, $colors[$i][0], $colors[$i][1]);

            $event = Event::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
                'event_date' => $data['event_date'],
                'location' => $data['location'],
                'cover_image' => $cover,
                'is_active' => true,
            ]);

            // Add 4 gallery images per event
            for ($j = 1; $j <= 4; $j++) {
                $galImage = $this->generateImage('events/gallery', $data['title'] . " - Photo $j", 800, 600, $colors[$i][0], $colors[$i][1]);
                EventImage::create([
                    'event_id' => $event->id,
                    'image_path' => $galImage,
                    'caption' => $data['title'] . ' - Photo ' . $j,
                    'sort_order' => $j,
                ]);
            }
        }
    }

    private function seedTestimonials(): void
    {
        $testimonials = [
            ['client_name' => 'Priya & Rahul Sharma', 'client_designation' => 'Wedding Couple', 'content' => 'BSK Photography made our wedding day absolutely perfect! Every photo tells a story and captures the emotions we felt. The team was professional, creative, and so easy to work with. We couldn\'t be happier with our wedding album.', 'rating' => 5],
            ['client_name' => 'Anita Desai', 'client_designation' => 'Fashion Designer', 'content' => 'I\'ve worked with many photographers for my fashion collections, but BSK Photography stands out for their creativity and attention to detail. The editorial shots were magazine-worthy. Highly recommended!', 'rating' => 5],
            ['client_name' => 'Vikram Mehta', 'client_designation' => 'CEO, TechCorp', 'content' => 'Outstanding corporate event coverage! The team captured every important moment of our annual day celebration. The photos were delivered promptly and the quality exceeded our expectations.', 'rating' => 5],
            ['client_name' => 'Sunita & Family', 'client_designation' => 'Family Portrait Client', 'content' => 'The family portrait session was such a wonderful experience. BSK Photography made everyone feel comfortable and natural. The photos are now proudly displayed in our living room.', 'rating' => 4],
            ['client_name' => 'Raj Kapoor', 'client_designation' => 'Brand Manager', 'content' => 'Excellent product photography! The images helped boost our online sales significantly. Clean, professional, and exactly what we needed for our e-commerce platform.', 'rating' => 5],
            ['client_name' => 'Meera Joshi', 'client_designation' => 'Bride', 'content' => 'From the pre-wedding shoot to the reception, every moment was captured beautifully. BSK Photography has an incredible eye for candid moments. Our wedding album is a treasure.', 'rating' => 5],
        ];

        $colors = ['#2c1810', '#1a1a2e', '#0f3460', '#1b1b2f', '#2d132c', '#1a1a1a'];

        foreach ($testimonials as $i => $data) {
            $photo = $this->generateImage('testimonials', substr($data['client_name'], 0, 2), 200, 200, $colors[$i], '#c9a96e');
            Testimonial::create([
                'client_name' => $data['client_name'],
                'client_designation' => $data['client_designation'],
                'client_image' => $photo,
                'content' => $data['content'],
                'rating' => $data['rating'],
                'is_active' => true,
                'sort_order' => $i,
            ]);
        }
    }

    private function seedBlogPosts(): void
    {
        $posts = [
            [
                'title' => '10 Tips for Perfect Wedding Photography',
                'excerpt' => 'Planning your dream wedding? Here are our top tips for ensuring your wedding photos are absolutely perfect.',
                'content' => "Your wedding day is one of the most important days of your life, and the photographs from that day will be treasured for generations. Here are our top tips for ensuring stunning wedding photos:\n\n1. **Meet Your Photographer Early** - Schedule a pre-wedding consultation to discuss your vision, preferred style, and must-have shots.\n\n2. **Create a Shot List** - While candid moments are beautiful, having a list of essential family groupings and key moments ensures nothing is missed.\n\n3. **Consider the Lighting** - Golden hour (just before sunset) provides the most flattering natural light for portraits.\n\n4. **Choose Your Venue Wisely** - Consider how photogenic the venue is when making your selection.\n\n5. **Allow Enough Time** - Don't rush your photo sessions. Build adequate time into your schedule for posed portraits.\n\n6. **Embrace Candid Moments** - Some of the best wedding photos are unplanned, genuine moments of joy.\n\n7. **Coordinate with Your Team** - Ensure your photographer, videographer, and planner are all on the same page.\n\n8. **Don't Forget the Details** - Rings, shoes, invitations, and decor all tell part of your wedding story.\n\n9. **Be Yourselves** - The most beautiful photos happen when couples are relaxed and being genuine.\n\n10. **Trust Your Photographer** - You hired a professional for a reason. Trust their expertise and creative vision.",
            ],
            [
                'title' => 'The Art of Portrait Photography',
                'excerpt' => 'Discover the secrets behind capturing compelling portraits that reveal the true essence of your subject.',
                'content' => "Portrait photography is more than just pointing a camera at someone. It's about capturing personality, emotion, and story in a single frame.\n\n**Understanding Light**\nLight is the most important element in portrait photography. Natural window light, golden hour sunlight, and carefully placed studio lights can dramatically change the mood and feel of a portrait.\n\n**Connection with Your Subject**\nThe best portraits come from genuine connections between the photographer and subject. Take time to talk, laugh, and make your subject feel comfortable before picking up the camera.\n\n**Composition Matters**\nThe rule of thirds, leading lines, and framing all play important roles in creating visually compelling portraits. Don't be afraid to experiment with different angles and perspectives.\n\n**Post-Processing**\nSubtle editing can enhance your portraits without making them look artificial. Focus on color correction, skin smoothing, and bringing out the eyes.\n\nAt BSK Photography, we believe every person has a unique story to tell through their portrait. Book your session today!",
            ],
            [
                'title' => 'Behind the Scenes: How We Cover Events',
                'excerpt' => 'A look behind the curtain at our event photography workflow, from preparation to final delivery.',
                'content' => "Ever wondered what goes into professionally covering an event? Here's our behind-the-scenes workflow:\n\n**Pre-Event Planning**\nBefore any event, we conduct a thorough site visit, study the event schedule, and plan our equipment needs. This preparation ensures we're ready for every moment.\n\n**Equipment Setup**\nWe typically use multiple camera bodies with various lenses to cover different situations. Fast prime lenses for low-light conditions, telephoto lenses for candid shots from a distance, and wide-angle lenses for venue shots.\n\n**During the Event**\nOur team splits into roles - one photographer focuses on key moments and speakers, while another captures candid interactions and details. This ensures comprehensive coverage.\n\n**Post-Production**\nAfter the event, we carefully curate and edit the best photographs. This includes color correction, exposure adjustment, and careful retouching where needed.\n\n**Delivery**\nFinal images are delivered within 7-10 business days through a secure online gallery. Clients receive both web-resolution and high-resolution files.\n\nReady to have your next event professionally covered? Contact us for a quote!",
            ],
        ];

        $colors = [['#3d0c02', '#ff6b6b'], ['#0a1628', '#4ecdc4'], ['#1a1a2e', '#f39c12']];

        foreach ($posts as $i => $data) {
            $image = $this->generateImage('blog', $data['title'], 1200, 600, $colors[$i][0], $colors[$i][1]);
            BlogPost::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'excerpt' => $data['excerpt'],
                'content' => $data['content'],
                'featured_image' => $image,
                'is_published' => true,
                'published_at' => now()->subDays($i * 7),
            ]);
        }
    }

    private function seedAbout(): void
    {
        $image = $this->generateImage('about', 'BSK Photography', 800, 800, '#1a1a1a', '#c9a96e');

        About::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'About BSK Photography',
                'content' => "BSK Photography is a premier photography studio based in Mumbai, Maharashtra. Founded with a passion for capturing life's most precious moments, we have grown into one of the most trusted names in professional photography.\n\nOur team of experienced photographers brings creativity, technical expertise, and a deep understanding of light and composition to every project. Whether it's a grand wedding celebration, an intimate portrait session, or a high-energy corporate event, we approach each assignment with the same dedication to excellence.\n\nWe believe that every photograph should tell a story. Our goal is to create images that not only document moments but also evoke the emotions and atmosphere of the experience. From the first consultation to the final delivery, we work closely with our clients to understand their vision and exceed their expectations.",
                'image' => $image,
                'experience' => '10+ Years of Professional Photography',
                'achievements' => "500+ Weddings Covered\n1000+ Portrait Sessions\n200+ Corporate Events\n50+ Fashion Shoots\nFeatured in Wedding Magazine India\nBest Photography Studio - Mumbai Awards 2025",
                'story' => "BSK Photography started in 2016 as a small studio with a big dream. Our founder, driven by an unwavering passion for visual storytelling, began capturing weddings and portraits with just a single camera and a lot of heart.\n\nOver the years, we've expanded our team, upgraded our equipment, and refined our craft. But one thing remains unchanged - our commitment to making every client feel special and delivering photographs that stand the test of time.\n\nToday, BSK Photography is proud to be one of Mumbai's leading photography studios, trusted by hundreds of families and businesses for their most important moments.",
            ]
        );
    }

    private function seedSocialLinks(): void
    {
        $links = [
            ['platform' => 'Facebook', 'url' => 'https://facebook.com/bskphotography', 'icon' => 'facebook'],
            ['platform' => 'Instagram', 'url' => 'https://instagram.com/bskphotography', 'icon' => 'instagram'],
            ['platform' => 'YouTube', 'url' => 'https://youtube.com/@bskphotography', 'icon' => 'youtube'],
            ['platform' => 'Twitter', 'url' => 'https://twitter.com/bskphotography', 'icon' => 'twitter-x'],
            ['platform' => 'Pinterest', 'url' => 'https://pinterest.com/bskphotography', 'icon' => 'pinterest'],
        ];

        foreach ($links as $i => $data) {
            SocialLink::updateOrCreate(
                ['platform' => $data['platform']],
                [
                    'url' => $data['url'],
                    'icon' => $data['icon'],
                    'is_active' => true,
                    'sort_order' => $i,
                ]
            );
        }
    }
}
