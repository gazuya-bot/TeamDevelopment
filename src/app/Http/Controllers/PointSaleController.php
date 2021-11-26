<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Point_sale;
use App\Models\Member_list;
use App\Models\Item_category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class PointSaleController extends Controller
{



    /**
     * ホーム画面表示
     * 
     */
    public function index()
    {

        // 顧客名と保有ポイントを取得
        $points = $this->get_sum_points();

        return view('home', ['points' => $points]);
    }

    /**
     * 売上管理画面表示
     */
    public function show_analysis()
    {
        $year =date('Y');
        $Nextyear = $year+1;

        $months = [
            $year."-04",
            $year."-05",
            $year."-06",
            $year."-07",
            $year."-08",
            $year."-09",
            $year."-10",
            $year."-11",
            $year."-12",
            $Nextyear."-01",
            $Nextyear."-02",
            $Nextyear."-03"
        ];

        // 売上一覧を取得
        $points = $this->get_sales_list($year,$Nextyear);       
        $sum_sales = [];

        foreach ($months as $month) {
            $sum = $this->get_month_sales($month);
            $sum_sales[] = $sum;
        }

        $label = [
            "4月",
            "5月",
            "6月",
            "7月",
            "8月",
            "9月",
            "10月",
            "11月",
            "12月",
            "1月",
            "2月",
            "3月"
        ];


       // 顧客名一覧を取得
        $members_lists = $this->get_members_list();
    
        return view('sales_management.analysis', [
            'points' => $points,
            'label' => $label,
            'sum_sales' => $sum_sales,
            'members_lists' => $members_lists
        ]);

    }


    /**
     * 売上管理画面表示（顧客別）
     */
    public function show_analysis_id($id)
    {
        

        $year =date('Y');
        $Nextyear = $year+1;

        $months = [
            $year."-04",
            $year."-05",
            $year."-06",
            $year."-07",
            $year."-08",
            $year."-09",
            $year."-10",
            $year."-11",
            $year."-12",
            $Nextyear."-01",
            $Nextyear."-02",
            $Nextyear."-03"
        ];


        // 売上一覧を取得
        
        $points = $this->get_sale_list($id,$year,$Nextyear);

        $sum_sales = [];

        foreach ($months as $month) {
            $sum = $this->get_month_sale_mem($month,$id);
            $sum_sales[] = $sum;
            
        }

        $label = [
            "4月",
            "5月",
            "6月",
            "7月",
            "8月",
            "9月",
            "10月",
            "11月",
            "12月",
            "1月",
            "2月",
            "3月"
        ];



       // 顧客名一覧を取得
        $members_lists = $this->get_members_list();

        $member_name = $this->get_member_name($id);

        return view('sales_management.analysis', compact(
            'points',
            'label',
            'sum_sales',
            'members_lists',
            'member_name'
        ));

    
    }



    /**
     * 売上編集画面表示
     */
    public function show_edit_price($id)
    {

        // 該当する売上データを取得
        $point = $this->get_sale_data($id);

        // 顧客名一覧を取得
        $members_lists = $this->get_members_list();



        return view('sales_management.price-edit', ['point' => $point, 'members_lists' => $members_lists]);
    }


    /**
     * 売上を更新
     */
    public function exe_update_price(Request $request, $id)
    {
        // 更新日時の取得
        $updated_at = new Carbon('now');
        $sale = $request->sale;
        $pay_point = $request->pay_point;
        // 該当データの取得
        $point = Point_sale::find($id);

        $point->members_id = $request->members_id;
        $point->sale = $sale;
        $point->pay_cash = $sale-$pay_point;
        $point->pay_point = $pay_point;
        $point->get_point = ($sale - $pay_point)*0.01;
        $point->updated_at = $updated_at;

        // 更新する
        $point->save();

        return redirect(route('show_analysis'))->with('flashmessage', '変更を保存しました');
    }

    
    /**
     * 売上削除画面表示
     */
    public function show_delete_price($id)
    {
        // 該当する売上データを取得
        $point = $this->get_sale_data($id);


        return view('sales_management.price-delete', [
            'point' => $point
        ]);
    }

    /**
     * 売上を削除 
     * */
    public function exe_delete_price($id)
    {
        $point =  Point_sale::find($id);

        //$point->delete();
        $point->is_delete = 'deleted';
        $point->save();


        return redirect(route('show_analysis'))->with('flashmessage', '削除しました');
    }






    /**
     * 月別売上
     */
    public function get_month_sales($month)
    {

        $record = DB::table('points')
            ->where("points.created_at", "like", $month . "%")
            ->where('is_delete','=','active')
            ->get();

        $count = $record->count();
        $sum = 0;
        for ($i = 0; $i < $count; $i++) {
            $sum = $record->sum("sale");
        }


        return $sum;
    }



    /**
     * 月別売上（顧客別）
     */
    public function get_month_sale_mem($month,$id)
    {
        
        $record = DB::table('points')
            ->join('members_lists', 'points.members_id', '=', 'members_lists.id')
            ->where("points.created_at", "like", $month . "%")
            ->where('members_lists.id', $id)
            ->where('is_delete','=','active')
            ->get();

        
        $count = $record->count();
        $sum = 0;

        for ($i = 0; $i < $count; $i++) {
            $sum = $record->sum("sale");
        }

        return $sum;
    }


    /**
     * 顧客名と保有ポイント取得
     * 
     * @return array $point
     */
    public function get_sum_points()
    {

        $points = DB::table('points')
            ->join('members_lists', 'points.members_id', '=', 'members_lists.id')
            ->select('members_lists.club_name', DB::raw("sum(points.get_point) as total_points"))
            ->where('is_delete','=','active')
            ->groupBy('members_lists.id')
            ->get();

        return $points;
    }



    /**
     * 売上一覧データ取得
     */
    public function get_sales_list($year,$Nextyear)
    {
        $points = DB::table('points')
            ->join('members_lists', 'points.members_id', '=', 'members_lists.id')
            ->select('points.*', 'members_lists.club_name')
            ->where('is_delete','=','active')
            ->where("points.created_at", "like", $year . "%")
            ->orWhere("points.created_at", "like", $Nextyear . "%")
            ->get();

        return $points;
    }



    /**
     * 売上一覧データ取得（顧客別）
     */
    public function get_sale_list($id,$year,$Nextyear)
    {
        $points = DB::table('points')
            ->join('members_lists', 'points.members_id', '=', 'members_lists.id')
            ->select('points.*', 'members_lists.club_name')
            ->where('is_delete','=','active')
            ->where('members_lists.id', $id)
            ->where("points.created_at", "like", $year . "%")
            ->orWhere("points.created_at", "like", $Nextyear . "%")
            ->get();

        return $points;
    }



    /**
     * 売上詳細データ取得
     */
    public function get_sale_data($id)
    {
        $point = DB::table('points')
            ->join('members_lists', 'points.members_id', '=', 'members_lists.id')
            ->select('points.*', 'members_lists.club_name', )
            ->where('points.id', $id)
            ->where('is_delete','=','active')
            ->first();

        return $point;
    }



    /**
     * 顧客一覧を取得
     * 
     * @return array $members_lists
     */
    public function get_members_list()
    {
        $members_lists = DB::table('members_lists')
            ->select('id', 'club_name')
            ->get();

        return $members_lists;
    }

    public function get_member_name($id){
        $member_name = DB::table('members_lists')
        ->select('club_name')
        ->where('id',$id)
        ->first();

        return $member_name;
    }


    
}
