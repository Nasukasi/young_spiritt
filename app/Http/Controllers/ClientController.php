<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
use Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::where('product_subcategory_id',$id)->latest()->get();
        return view('user_template.category', compact('category','products'));
    }
    public function SingleProduct($id){
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$subcat_id)->latest()->get();

        return view('user_template.product',compact('product','related_products'));
    }
    public function AddToCart(){
        $userid= Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        return view('user_template.addtocart', compact('cart_items'));
}
public function Checkout(){
    $userid= Auth::id();
    $cart_items = Cart::where('user_id',$userid)->get();
    $shipping_address = ShippingInfo::where('user_id',$userid)->first();

        return view('user_template.checkout', compact('cart_items','shipping_address'));
}
public function UserProfile(){
        return view('user_template.userprofile');
}

    public function NewRelease(){
        return view('user_template.newrelease');
    }



public function TodayDeal(){
        return view('user_template.todaydeal');
}
    public function CustomerService(){
        return view('user_template.customerservice');
    }

    public function PendingOrders(){
        $userid= Auth::id();
       $pending_orders = Order::where('user_id',$userid)->get();
        return view('user_template.pedingorders',compact('pending_orders'));
    }

    public function History(){
        return view('user_template.history');
    }

    public function AddProductToCart(Request $request){
            $product_price = $request->price;
            $quantity = $request->quantity;
            $price = $product_price * $quantity;
        Cart::insert([
           'product_id'=> $request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$request->quantity,
            'price'=>$price
        ]);
        return redirect()->route('addtocart')->with('message', 'Item added To Cart Successfully!');
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Item Have Been Removed From Cart Successfully!');
    }

    public function Shipping(){
        return view('user_template.shipping');
    }

    public function AddShippingAddress(Request $request){
        ShippingInfo::insert([
            'user_id'=>Auth::id(),
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'city'=>$request->city,
            'address_1'=>$request->address_1,
            'address_2'=>$request->address_2,
            'postal_code'=>$request->postal_code,
            'phone_number'=>$request->phone_number,

        ]);
    return redirect()->route('checkout');
    }

    public function PlaceOrder(){
        $userid= Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        $shipping_address = ShippingInfo::where('user_id',$userid)->first();

        foreach ($cart_items as $item){
            Order::insert([
                'user_id'=>$userid,
                'shipping_phonenumber'=>$shipping_address->phone_number,
                'shipping_address'=>$shipping_address->address_1,
                'shipping_city'=>$shipping_address->city,
                'shipping_postalcode'=>$shipping_address->postal_code,
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'total_price'=>$item->price,
            ]);
            $id = $item->id;
            Cart::findOrFail($id)->delete();

        }
        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('message', 'You Order Has Been Placed Successfully!');
    }
    public function Logout()
    {
        Auth::logout(); // logs out the currently authenticated user
        return redirect('/login'); // redirects the user to the login page after logout
    }
}
