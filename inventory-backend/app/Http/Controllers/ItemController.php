<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['category', 'supplier', 'admin'])->get();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'stock' => 'required|integer|min:0', // Tambahkan validasi untuk stock
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'created_by' => 'required|exists:admins,id',
        ]);

        $item = Item::create($validated);
        return response()->json($item, 201);
    }

    public function stockSummary()
    {
        $totalItems = Item::sum('stock'); // Jumlah total unit barang (stok)
        $totalValue = Item::selectRaw('SUM(price * stock) as total_value')->value('total_value'); // Total nilai stok (harga × stok)
        $averagePrice = Item::avg('price'); // Rata-rata harga

        return response()->json([
            'total_items' => (int) $totalItems,
            'total_value' => (int) $totalValue,
            'average_price' => (int) $averagePrice,
        ]);
    }

    public function lowStock()
    {
        $lowStockThreshold = 5; // Ambang batas stok rendah
        $lowStockItems = Item::with(['category', 'supplier', 'admin'])
                            ->where('stock', '<=', $lowStockThreshold)
                            ->get();

        if ($lowStockItems->isEmpty()) {
            return response()->json([
                'message' => 'No items with low stock found.'
            ], 200);
        }

        return response()->json($lowStockItems);
    }
}