<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index(Request $request)
    {
        $attributes = $request->query('attributes');
        $variantDetails = ProductVariant::whereIn('attribute_id', explode(',', $attributes))->get();

        return response()->json(['variants' => $variantDetails]);
    }
}
