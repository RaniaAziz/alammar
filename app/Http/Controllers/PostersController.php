<?php

namespace App\Http\Controllers;


use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class PostersController extends Controller
{

    public function index()
    {
        $title="اللوحات الإعلانية";
        meta_data($title, $title, ['' => $title]);
        return view('posters.index');
    }

    public function data()
    {
        $items = new Poster();

        if(request()->has('filter')) {
            $filter = json_decode(request('filter'));
            $items = $items->where(function($query) use($filter){
                if($filter->poster_no){
                    $query->where('poster_no', $filter->poster_no);

                }
                if($filter->city){
                    $query->where('city', 'LIKE', "%$filter->city%");

                }
                if($filter->neighborhood){
                    $query->where('neighborhood', 'LIKE', "%$filter->neighborhood%");

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
        $title=" إضافة لوحة جديدة";
        meta_data($title, $title, ['' => $title]);
        return view('posters.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'poster_no' => 'required',
        ]);

        DB::transaction(function () use($request) {

             Poster::create([
                'poster_no' => $request->poster_no,
                'size' => $request->size,
                'type' => $request->type,
                'status' => $request->status,
                'image' => $request->image,

            ]);
        });

        return response()->json(['message' => 'تم الحفظ بنجاح']);
    }

    public function edit(Poster $item)
    {
        $title=" تعديل بيانات لوحة";
        meta_data($title, $title, ['' => $title]);
        return view('posters.form', compact('item'));
    }

    public function show(Poster $item)
    {
        $title=" عرض بيانات اللوحة";
        meta_data($title, $title, ['' => $title]);
        return view('posters.show', compact('item'));
    }

    public function update(Poster $item, Request $request)
    {

        $request->validate([
            'poster_no' => 'required',
        ]);

        DB::transaction(function() use($item, $request) {

            $item->poster_no =  $request->poster_no;
            $item->size = $request->size;
            $item->type  = $request->type;
            $item->status = $request->status;
            $item->image = $request->image;
            $item->save();

        });

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    public function destroy(Poster $item)
    {
            $item->delete();
            return response()->json(['message' =>'تم الحذف بنجاح']);

    }
}
