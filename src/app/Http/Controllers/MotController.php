<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;

use App\Models\Member_list;


class MotController extends Controller
{
    public function inpoint()
    {
        $members = Member_list::orderby('id', 'asc')->get();
        return view('inpoint', compact('members'));
    }

    public function add(Request $request)
    {
        if($request->has('clear_data')){

            return redirect('/inpoint');

        }elseif($request->has('write_data')){

            $request->validate([
                'members_id'=>'required',
                'sale'=>'required|integer|numeric|gt:0',
                'pay_point'=>'required|integer|numeric|lte:sale',
            ]);

            $members_id = $request->members_id;
            $sale = $request->sale;
            $pay_point = $request->pay_point;

            $data = [
                'members_id'=>$members_id,
                'sale'=>$sale,
                'pay_cash'=>$sale - $pay_point,
                'pay_point'=>$pay_point,
                'get_point'=>($sale - $pay_point)*0.01,
                'created_at'=>date('Y-m-d H:i:s')
            ];
            Point::insert($data);

            return redirect('/inpoint')->with('flash_message', '登録が完了しました');;

        }
    }    
}




