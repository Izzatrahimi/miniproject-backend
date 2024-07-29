<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use Illuminate\Support\Facades\Auth;

class ParcelTrackingController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Start with querying all delivery orders associated with the authenticated user
        $deliveryOrdersQuery = DeliveryOrder::with(['deliveryOrderDetails', 'deliveryOrderDetails.product'])
                                            ->where('user_id', $user->id);

        // Check if there's a search query
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            // Filter delivery orders by sales_order_no
            $deliveryOrdersQuery->where('sales_order_no', 'like', '%' . $searchTerm . '%');
        }

        // Execute the query and get the results
        $deliveryOrders = $deliveryOrdersQuery->get();

        // Return the data as JSON
        return response()->json($deliveryOrders);
    }
}
