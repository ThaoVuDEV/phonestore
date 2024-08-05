<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the user has purchased the product
        $userId = Auth::id();
        $productId = $request->input('product_id');

        // Assuming you have an Order model and order_details table
        $hasPurchased = DB::table('order_details')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->withErrors(['error' => 'You need to purchase this product to leave a review.'])->withInput();
        }

        // Save the review
        Review::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => $request->input('rating'), // Assuming you add this field to the form
            'comment' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
