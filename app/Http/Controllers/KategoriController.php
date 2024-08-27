<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = [
            [
                "id" => 1,
                "name" => "Buah & Sayur",
            ],
            [
                "id" => 2,
                "name" => "Personal Care",
            ]
        ];
        
        $product = [
            [
                "id" => 1,
                "name" => "Semangka",
                "cat_id" => 1,
                "price" => 12000,
                "discount" => 5, // 5% diskon
                "discount_period" => "2024-08-01 to 2024-08-31",
                "discounted_price" => 12000 - (12000 * 0.05) // harga setelah diskon
            ],
            [
                "id" => 2,
                "name" => "Apel",
                "cat_id" => 1,
                "price" => 15000,
                "discount" => null, // tidak ada diskon
                "discount_period" => null,
                "discounted_price" => null // tidak ada harga diskon
            ],
            [
                "id" => 3,
                "name" => "Jeruk",
                "cat_id" => 1,
                "price" => 13000,
                "discount" => 10, // 10% diskon
                "discount_period" => "2024-08-15 to 2024-08-31",
                "discounted_price" => 13000 - (13000 * 0.10)
            ],
            [
                "id" => 4,
                "name" => "Tomat",
                "cat_id" => 1,
                "price" => 8000,
                "discount" => null,
                "discount_period" => null,
                "discounted_price" => null
            ],
            [
                "id" => 5,
                "name" => "Brokoli",
                "cat_id" => 1,
                "price" => 17000,
                "discount" => 15, // 15% diskon
                "discount_period" => "2024-09-01 to 2024-09-15",
                "discounted_price" => 17000 - (17000 * 0.15)
            ],
            [
                "id" => 6,
                "name" => "Bayam",
                "cat_id" => 1,
                "price" => 5000,
                "discount" => null,
                "discount_period" => null,
                "discounted_price" => null
            ],
            [
                "id" => 7,
                "name" => "Pisang",
                "cat_id" => 1,
                "price" => 20000,
                "discount" => 10, // 10% diskon
                "discount_period" => "2024-09-01 to 2024-09-15",
                "discounted_price" => 20000 - (20000 * 0.10)
            ],
            [
                "id" => 8,
                "name" => "Wortel",
                "cat_id" => 1,
                "price" => 9000,
                "discount" => null,
                "discount_period" => null,
                "discounted_price" => null
            ],
            [
                "id" => 9,
                "name" => "Shampoo",
                "cat_id" => 2,
                "price" => 35000,
                "discount" => 5, // 5% diskon
                "discount_period" => "2024-08-10 to 2024-08-20",
                "discounted_price" => 35000 - (35000 * 0.05)
            ],
            [
                "id" => 10,
                "name" => "Sabun Mandi",
                "cat_id" => 2,
                "price" => 10000,
                "discount" => null,
                "discount_period" => null,
                "discounted_price" => null
            ],
            [
                "id" => 11,
                "name" => "Pasta Gigi",
                "cat_id" => 2,
                "price" => 15000,
                "discount" => 15, // 15% diskon
                "discount_period" => "2024-08-25 to 2024-09-05",
                "discounted_price" => 15000 - (15000 * 0.15)
            ],
            [
                "id" => 12,
                "name" => "Deodorant",
                "cat_id" => 2,
                "price" => 25000,
                "discount" => null,
                "discount_period" => null,
                "discounted_price" => null
            ],
            [
                "id" => 13,
                "name" => "Lotion",
                "cat_id" => 2,
                "price" => 45000,
                "discount" => 10, // 10% diskon
                "discount_period" => "2024-08-15 to 2024-08-25",
                "discounted_price" => 45000 - (45000 * 0.10)
            ],
            [
                "id" => 14,
                "name" => "Tissue Basah",
                "cat_id" => 2,
                "price" => 12000,
                "discount" => null,
                "discount_period" => null,
                "discounted_price" => null
            ],
            [
                "id" => 15,
                "name" => "Shaving Cream",
                "cat_id" => 2,
                "price" => 30000,
                "discount" => 5, // 5% diskon
                "discount_period" => "2024-08-20 to 2024-08-31",
                "discounted_price" => 30000 - (30000 * 0.05)
            ],
            [
                "id" => 16,
                "name" => "Face Wash",
                "cat_id" => 2,
                "price" => 40000,
                "discount" => null,
                "discount_period" => null,
                "discounted_price" => null
            ]
        ];

        // return view("admin.index", compact("kategori"));
        return view("admin.index")->with([
            "kategori"=> $kategori,
            "product"=> $product
        ]);
    }
}
