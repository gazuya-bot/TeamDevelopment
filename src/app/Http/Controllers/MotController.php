<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;


class MotController extends Controller
{
    public function inpoint()
    {
        return view('inpoint');
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

            $members = $request->members_id;

            if($members == "A高校"){
                $members_id = 1;
            }elseif($members == "B高校"){
                $members_id = 2;
            }elseif($members == "C高校"){
                $members_id = 3;
            }elseif($members == "D高校"){
                $members_id = 4;
            }elseif($members == "E高校"){
                $members_id = 5;
            }

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

            return redirect('/inpoint');

        }
    }
    
}




