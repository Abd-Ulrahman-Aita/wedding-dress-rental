<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dress;

class DressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dresses = [
            [
                'name' => 'Elegant White Dress',
                'description' => 'A beautiful elegant white dress perfect for weddings.',
                'sizes' => json_encode(['S', 'M', 'L']),
                'quantity' => 10,
                'rental_price' => 150.00,
                'image_url' => 'https://s.alicdn.com/@sc04/kf/Hb900f0eda15e4d86a905a1250ab4181f7.jpg_720x720q50.jpg',
            ],
            [
                'name' => 'Classic A-Line Dress',
                'description' => 'A classic A-line dress that flatters every figure.',
                'sizes' => json_encode(['M', 'L', 'XL']),
                'quantity' => 8,
                'rental_price' => 120.00,
                'image_url' => 'https://s.alicdn.com/@sc04/kf/H3332371337274503adbc673fcad5cd26u.jpg_720x720q50.jpg',
            ],
            [
                'name' => 'Vintage Lace Dress',
                'description' => 'A stunning vintage lace dress for a romantic wedding.',
                'sizes' => json_encode(['S', 'M']),
                'quantity' => 5,
                'rental_price' => 200.00,
                'image_url' => 'https://s.alicdn.com/@sc04/kf/Hb08e2cf1f1624d43a4de933dc2e7c9c2s.jpg_720x720q50.jpg',
            ],
            [
                'name' => 'Bohemian Chic Dress',
                'description' => 'A free-spirited bohemian chic dress for a unique wedding look.',
                'sizes' => json_encode(['S', 'M', 'L', 'XL']),
                'quantity' => 7,
                'rental_price' => 180.00,
                'image_url' => 'https://s.alicdn.com/@sc04/kf/H2bec67b198484022a231430f9d6c4aa3u.jpg_720x720q50.jpg',
            ],
            [
                'name' => 'Princess Ball Gown',
                'description' => 'A royal princess ball gown dress with intricate beadwork.',
                'sizes' => json_encode(['M', 'L', 'XL']),
                'quantity' => 4,
                'rental_price' => 250.00,
                'image_url' => 'https://s.alicdn.com/@sc04/kf/H37f3f2562c834b2aac3ae4b4bcbe8c74l.jpg_720x720q50.jpg',
            ],
            [
                'name' => 'Modern Mermaid Dress',
                'description' => 'A sleek, form-fitting mermaid dress for a modern bridal look.',
                'sizes' => json_encode(['S', 'M', 'L']),
                'quantity' => 6,
                'rental_price' => 220.00,
                'image_url' => 'https://s.alicdn.com/@sc04/kf/HTB1dTrGel1D3KVjSZFy762uFpXa7.png_720x720q50.jpg',
            ],
        ];

        foreach ($dresses as $dress) {
            Dress::create($dress);
        }
    }
}
