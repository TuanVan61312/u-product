<?php

namespace App\Http\Controllers;

use App\Repository\CateRepos;
use App\Repository\GiftsRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiftsController extends Controller
{
    public function index()
    {
        $product = GiftsRepos::getAllGifts();
        return view('giftshop.gifts.index',
            [
                'product' => $product
            ]);
    }


    public function show($Gifts_id)
    {

        $product = GiftsRepos::getGiftsByID($Gifts_id);
        $category = CateRepos::getCateNameByGiftsID($Gifts_id);
        return view('giftshop.gifts.show',
            [
                'product' => $product[0],
                'category' => $category[0]
            ]
        );
    }

    public function create()
    {
        $category = CateRepos::getAllCate();

        return view(
            'giftshop.gifts.new',
            ["product" => (object)[
                'Gifts_id' => '',
                'Gifts_Name' => '',
                'Cate_id'=> '',
                'Price' => '',
                'Brand' => '',
                'Gifts_Description' => '',
                'Gifts_Images' => '',
            ],
                "category" =>$category
            ]);

    }


    public function store(Request $request)
    {
        //dd($request->all());
        $this->formValidatePro($request)->validate();
        $path = $request->file('Gifts_Images')->store('public/Images');

        $product = (object)[
            'Gifts_Name' => $request->input('Gifts_Name'),
            'Cate_id' => $request->input('Cate_id'),
            'Price' => $request->input('Price'),
            'Brand' => $request->input('Brand'),
            'Gifts_Description' => $request->input('Gifts_Description'),
            'Gifts_Images' => substr($path, 7)
        ];

        $newGift_id = GiftsRepos::insert($product);
        return redirect()
            ->action('GiftsController@index')
            ->with('msg', 'New Gift with id: ' . $newGift_id . ' has been inserted');

    }

    public function edit($Gifts_id)
    {
        $product = GiftsRepos::getGiftsByID($Gifts_id);
        $category = CateRepos::getAllCateName();

        return view(
            'giftshop.gifts.update',
            ["product" => $product[0], "category" => $category]);
    }

    public function update(Request $request, $Gifts_id)
    {
        if ($Gifts_id != $request->input('Gifts_id')) {
            return redirect()->action('GiftsController@index');
        }

        $this->formValidatePro($request)->validate();

        $path = $request->file('Gifts_Images')->store('public');

        $product = (object)[
            'Gifts_id' => $request->input('Gifts_id'),
            'Gifts_Name' => $request->input('Gifts_Name'),
            'Cate_id' => $request->input('Cate_id'),
            'Price' => $request->input('Price'),
            'Brand' => $request->input('Brand'),
            'Gifts_Description' => $request->input('Gifts_Description'),
            'Gifts_Images' => substr($path, 7)
        ];
        GiftsRepos::update($product);

        return redirect()->action('GiftsController@index');

    }

//    public function confirm($Gift_id){
//        $product = GiftsRepos::getGiftsByID($Gift_id);
//
//        return view('AdminSite.gifts.confirm',
//            [
//                'product' => $product[0]
//            ]
//        );
//    }
//
//    public function destroy(Request $request, $Gift_id)
//    {
//
//
//        GiftsRepos::delete($Gift_id);
//
//        return redirect()->action('GiftsController@index');
//    }

    private function formValidatePro(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'Gifts_Name' => ['required'],
                'Cate_id' => ['required'],
                'Price' => ['required'],
                'Brand' => ['required'],
                'Gifts_Description' => ['required'],
                //'Gifts_Images' => ['required'],
            ]
        );
    }
}
