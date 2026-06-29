<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'The Highland Throw',
                'category' => 'Home Decor',
                'price' => 245.00,
                'description' => 'A thick, luxuriously soft blanket knitted by hand in our seaside studio. The Highland Throw is designed to bring warmth and a textured, grounding aesthetic to your living space. Made using ethically sourced merino wool dyed with natural plant extracts, it features a chunky, breathable stitch pattern that feels incredibly cozy without ever feeling heavy.',
                'image' => 'images/product-1.png',
                'difficulty_level' => null,
                'material' => '100% Ethically Sourced Merino Wool',
                'dimensions' => '50" x 70"',
                'in_stock' => true,
                'featured' => true,
            ],
            [
                'name' => 'Crochet Fiber Earrings',
                'category' => 'Accessories',
                'price' => 45.00,
                'description' => 'Hand-crocheted using natural plant-dyed flax and organic cotton threads. These statement earrings feature intricate geometric motifs suspended from hypoallergenic gold-plated hoops, offering a lightweight and organic touch to any ensemble.',
                'image' => 'images/product-2.png',
                'difficulty_level' => null,
                'material' => '100% Organic Pima Cotton, Hypoallergenic Gold-Plated Hoops',
                'dimensions' => '2" Length, 1.5" Width',
                'in_stock' => true,
                'featured' => true,
            ],
            [
                'name' => 'Woven Alpaca Scarf',
                'category' => 'Accessories',
                'price' => 120.00,
                'description' => 'An everyday luxury item woven with premium baby alpaca fibers. Incredibly soft against the skin, hypo-allergenic, and naturally temperature-regulating. The scarf features a subtle herringbone weave structure and delicate raw eyelash fringes, representing a perfect union of modern minimalism and heritage craftsmanship.',
                'image' => 'images/product-3.png',
                'difficulty_level' => null,
                'material' => '100% Baby Alpaca, Undyed & Natural Flax tones',
                'dimensions' => '14" x 78"',
                'in_stock' => true,
                'featured' => true,
            ],
            [
                'name' => 'Sienna Crop Top Crochet Kit',
                'category' => 'Kits',
                'price' => 65.00,
                'description' => 'Create your own summer statement piece. This all-in-one crochet kit contains everything you need to stitch the Sienna Crop Top: premium organic pima cotton yarn in your selected colorway, a hand-turned rosewood crochet hook, and our detailed step-by-step printed pattern guide complete with stitch illustrations.',
                'image' => 'images/product-1.png',
                'difficulty_level' => 'Intermediate',
                'material' => 'Organic Pima Cotton Yarn & Hand-turned Rosewood Hook',
                'dimensions' => 'Sizes XS to XXL inclusive',
                'in_stock' => true,
                'featured' => false,
            ],
            [
                'name' => 'Artisanal Fiber Necklace',
                'category' => 'Accessories',
                'price' => 65.00,
                'description' => 'A sculptural textile necklace crocheted with soft flax and hemp fibers. Designed to rest comfortably along the collarbone, it features a series of interlocking organic rings that showcase the beauty of raw materials and slow, intentional crafting.',
                'image' => 'images/product-2.png',
                'difficulty_level' => null,
                'material' => '100% Organic Linen & Soft Hemp fibers',
                'dimensions' => '18" Length, adjustable tie back',
                'in_stock' => true,
                'featured' => false,
            ],
            [
                'name' => 'Alpaca Slouch Beanie Pattern',
                'category' => 'Patterns',
                'price' => 8.50,
                'description' => 'A clean, modern slouchy beanie pattern optimized for beginners. Written in clear, non-abbreviated language, this pattern is perfect for those looking to practice their basic knit and purl stitches. It includes instant digital PDF download access, full video tutorial links, and size guides for adults and kids.',
                'image' => 'images/product-3.png',
                'difficulty_level' => 'Beginner',
                'material' => 'Digital PDF Download (Instant Email Delivery)',
                'dimensions' => 'One size fits all (adjustable)',
                'in_stock' => true,
                'featured' => false,
            ],
            [
                'name' => 'Linen Tote Bag Crochet Kit',
                'category' => 'Kits',
                'price' => 58.00,
                'description' => 'Stitch a durable, classic market bag. This kit uses 100% natural, unbleached linen thread which yields a sturdy mesh weave structure. Includes linen thread spools, a custom metal crochet hook, a stitch marker, and an printed instruction booklet. The finished bag is completely biodegradable, strong, and machine washable.',
                'image' => 'images/product-1.png',
                'difficulty_level' => 'Beginner',
                'material' => '100% Belgian Linen Thread & Metal Hook',
                'dimensions' => '14" Width, 16" Length (excluding straps)',
                'in_stock' => true,
                'featured' => false,
            ]
        ];

        foreach ($products as $p) {
            $p['slug'] = Str::slug($p['name']);
            Product::create($p);
        }
    }
}
