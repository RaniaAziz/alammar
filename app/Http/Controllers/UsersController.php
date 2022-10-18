<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{

    public function index()
    {
        $title="فريق العمل";
        meta_data($title, $title, ['' => $title]);
        return view('users.index');
    }

    public function data()
    {

        $items = new User();
        if(request()->has('filter')) {
            $filter = json_decode(request('filter'));
            $items = $items->where(function($query) use($filter){
                if($filter->name){
                    $query->where('name', 'LIKE', "%$filter->name%");

                }
                if($filter->mobile){
                    $query->where('mobile', $filter->mobile);

                }
                if($filter->email){
                    $query->where('email', 'LIKE', "%$filter->email%");

                }
            });
        }
        if(request()->has('sort')) {
            $sort = json_decode(request('sort'), true);
            $fieldName = $sort['fieldName'] && strlen($sort['fieldName']) ? $sort['fieldName'] : 'id';
            $order = $sort['order'] && strlen($sort['order']) ? $sort['order'] : 'desc';
            $items = $items->orderBy($fieldName, $order);
        }

        $items = $items->paginate(PER_PAGE);

        return response()->json(compact('items'));
    }

    public function create()
    {
        $title=" إضافة موظف";
        meta_data($title, $title, ['' => $title]);
        return view('users.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        DB::transaction(function () use($request) {

             User::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => Hash::make($request->password),


            ]);

        });

        return response()->json(['message' => 'تم الحفظ بنجاح']);
    }

    public function edit(User $item)
    {
        $title=" تعديل بيانات الموظف";
        meta_data($title, $title, ['' => $title]);
        return view('users.form', compact('item'));
    }

    public function show(User $item)
    {
        $title=" عرض بيانات الموظف";
        meta_data($title, $title, ['' => $title]);
        return view('users.show', compact('item'));
    }

    public function update(User $item, Request $request)
    {


        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);

        DB::transaction(function() use($item, $request) {

            $item->name = $request->name;
            $item->mobile = $request->mobile;
            $item->email = $request->email;
            $item->password =Hash::make($request->password);
            $item->save();

        });

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    public function destroy(User $item)
    {

            $item->delete();
           return response()->json(['message' =>'تم الحذف بنجاح']);


    }
}
