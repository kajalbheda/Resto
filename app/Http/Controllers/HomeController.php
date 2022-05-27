<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\FoodChef;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            return redirect('redirects');
        } else {
            $data = Food::all();
            $chefdata = FoodChef::all();
            return view("home", ['data' => $data, 'chefdata' => $chefdata]);
        }
    }

    public function redirects()
    {
        $data = Food::all();
        $chefdata = FoodChef::all();
        $userType = Auth::user()->usertype;
        //echo $userType;

        if ($userType == 1) {
            return view('admin.adminhome');
        } else {

            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('home', ['data' => $data, 'chefdata' => $chefdata, 'count' => $count]);
        }
    }

    public function addCart(Request $req, $id)
    {
        if (Auth::id()) {

            //dd($req->toArray());
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $req->quantity;

            $cart = new Cart;

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quanitity = $quantity;
            $cart->save();
            return redirect()->back()->with('msg', 'Item Added to Cart Successfully!');
        } else {
            return redirect('/login');
        }
    }

    public function showCart($id)
    {
        if(Auth::id()==$id){

        $count = Cart::where('user_id', $id)->count();
        $data = Cart::SELECT('carts.id', 'food.title', 'food.price', 'carts.quanitity')->where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        return view('showcart', ['count' => $count, 'data' => $data]);
        }
        else{
            return redirect()->back();
        }
    }

    public function removeCart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with("msg", "Cart Item removed successfully!");
    }

    public function orderConfirm(Request $req)
    {
        //dd($req->toArray());

        foreach ($req->foodname as $key => $foodname) {
            $data = new Order;
            $data->foodname = $foodname;
            $data->price = $req->price[$key];
            $data->quantity = $req->quantity[$key];
            $data->user_name = $req->name;
            $data->phone = $req->phone;
            $data->address = $req->address;
            $data->save();
        }
        return redirect()->back()->with("msg", "Order Placed Successfully!");
    }
}
