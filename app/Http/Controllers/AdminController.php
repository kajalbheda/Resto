<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\Reservation;
use App\Models\FoodChef;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user()
    {
        $data = User::all();

        return view("admin.user", ["data" => $data]);
    }
    public function userTrash()
    {
        $data = User::onlyTrashed()->get();

        return view("admin.user_trash", ["data" => $data]);
    }

    public function restoreUser($id)
    {
        //echo $id;
        $data = User::withTrashed()->find($id);
        if (!is_null($data)) {
            $data->restore();
        }
        return redirect()->back()->with("msg", "User Restoreded Sucessfully!");
    }

    public function deleteUsers($id)
    {
        //echo $id;
        $data = User::find($id);
        $data->delete();

        return redirect("users")->with("msg", "User moved to trash!");
    }

    public function forceDeleteUsers($id)
    {
        //echo $id;
        $data = User::withTrashed()->find($id);
        $data->forceDelete();

        return redirect()->back()-> with("msg", "User Deleted Sucessfully!");
    }

    public function foodMenu()
    {
        $data = Food::all();

        return view("admin.foodmenu", ["data" => $data]);
    }

    public function addfoodMenu()
    {
        return view("admin.insert_foodmenu");
    }


    public function uploadMenu(Request $req)
    {
        if ($req->hasFile('image')) {
            $imageName = time() . '.' . $req->image->extension();
            echo $imageName;
            $req->image->move(public_path('foodimage'), $imageName);
        }

        $f              = new Food();
        $f->title       = $req->title;
        $f->price       = $req->price;
        $f->image       = $imageName;
        $f->description = $req->desc;
        $f->save();

        return redirect("foodmenu");
    }


    public function deleteFoods($id)
    {
        $data = Food::where('id', $id)->first();

        if (!empty($data->image)) {
            $path = public_path("/foodimage/$data->image");
            @unlink($path);
        }

        $data = Food::find($id);
        $data->delete();

        return redirect("foodmenu")->with("msg", "FoodItem Deleted Sucessfully!");
    }


    public function editfoodmenu($id)
    {
        $data = Food::where('id', $id)->first();

        return view('admin.editfoodmenu', ['record' => $data]);
    }


    public function updateFoodmenu(Request $req)
    {
        $id = $req->id;

        if ($req->hasFile('image')) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('foodimage'), $imageName);

            //old image delete from folder
            $data = Food::where('id', $id)->first();
            if (!empty($data->image)) {
                $path = public_path("/foodimage/$data->image");
                @unlink($path);
            }
        } else {
            $data = Food::where('id', $id)->first();
            $imageName = $data->image;
        }

        $data = array(
            'title' => $req->title,
            'price' => $req->price,
            'image' => $imageName,
            'description' => $req->desc
        );

        Food::where('id', $id)->update($data);
        return redirect('/foodmenu')->with('msg', 'Record updated Successfully!');
    }

    public function Reservation(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:12|integer',
            'guest' => 'required|integer',
            'date' => 'required',
            'time' => 'required',
        ], [
            'name.required' => 'Name is required',
            'time.required' => 'Time is required',
        ]);

        $data = new Reservation();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->guest = $req->guest;
        $data->date = $req->date;
        $data->time = $req->time;
        $data->message = $req->message;

        $data->save();
        return redirect()->back()->with("msg", "Reservation Successfull");
    }

    public function viewReservations()
    {
        $data = Reservation::all();
        return view("admin.adminreservation", ["data" => $data]);
    }
    public function adminChef()
    {
        $data = FoodChef::all();
        return view("admin.adminchef", ["data" => $data]);
    }
    public function addchef()
    {
        return view("admin.addchef");
    }
    public function insertChef(Request $req)
    {
        if ($req->hasFile('image')) {
            $imageName = time() . '.' . $req->image->extension();
            echo $imageName;
            $req->image->move(public_path('chefimages'), $imageName);
        }

        $cf             = new FoodChef();
        $cf->name       = $req->name;
        $cf->speciality       = $req->speciality;
        $cf->image       = $imageName;
        $cf->facebooklink = $req->fb_link;
        $cf->instalink = $req->in_link;
        $cf->twitterlink = $req->tw_link;
        $cf->googlelink = $req->gl_link;
        $cf->save();

        return redirect("adminchef");
    }
    public function editchef($id)
    {
        $data = FoodChef::where('id', $id)->first();

        return view('admin.editchef', ['record' => $data]);
    }
    public function updateChef(Request $req)
    {
        //dd($req->toArray());

        $id = $req->id;

        if ($req->hasFile('image')) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('chefimages'), $imageName);

            //old image delete from folder
            $data = FoodChef::where('id', $id)->first();
            if (!empty($data->image)) {
                $path = public_path("/chefimages/$data->image");
                @unlink($path);
            }
        } else {
            $data = FoodChef::where('id', $id)->first();
            $imageName = $data->image;
        }

        $data = array(
            'name'       => $req->name,
            'speciality' => $req->speciality,
            'image'      => $imageName,
            'facebooklink' => $req->fb_link,
            'instalink' => $req->in_link,
            'twitterlink' => $req->tw_link,
            'googlelink' => $req->gl_link
        );

        FoodChef::where('id', $id)->update($data);
        return redirect('/adminchef')->with('msg', 'Record updated Successfully!');
    }
    public function deleteChef($id)
    {
        $data = FoodChef::where('id', $id)->first();

        if (!empty($data->image)) {
            $path = public_path("/chefimages/$data->image");
            @unlink($path);
        }

        $data = FoodChef::find($id);
        $data->delete();

        return redirect("adminchef")->with("msg", "Chef Record Deleted Sucessfully!");
    }

    public function Orders()
    {

        $data = Order::all();
        return view('admin.orders', ['data' => $data]);
    }
    public function searchorder(Request $req)
    {
        $search = $req->search;
        $data = Order::where('user_name', 'Like', '%' . $search . '%')->orWhere('foodname', 'Like', '%' . $search . '%')->get();
        return view('admin.orders', ['data' => $data]);
    }
}
