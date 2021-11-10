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
        // 売上一覧を取得
        $points = $this->get_sales_list();

        $sum_sales = [];

        $months = [
            "2021-04",
            "2021-05",
            "2021-06",
            "2021-07",
            "2021-08",
            "2021-09",
            "2021-10",
            "2021-11",
            "2021-12",
            "2022-01",
            "2022-02",
            "2022-03"
        ];
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


        $category_ids = $this->get_item_categories();

        foreach ($category_ids as $category_id_1) {
            $category_id = $category_id_1->id;
            $category_name[$category_id] = $category_id_1->category_name;
            $category_item[$category_id] = $this->get_category_count($category_id);
        }

       // 顧客名一覧を取得
        $members_lists = $this->get_members_list();
    
        return view('sales_management.analysis', [
            'points' => $points,
            'label' => $label,
            'sum_sales' => $sum_sales,
            'category_name' => $category_name,
            'category_item' => $category_item,
            'members_lists' => $members_lists
        ]);

    }


    /**
     * 売上管理画面表示（顧客別）
     */
    public function show_analysis_id($id)
    {
        // 売上一覧を取得
        
        $points = $this->get_sale_list($id);
    

        $sum_sales = [];

        $months = [
            "2021-04",
            "2021-05",
            "2021-06",
            "2021-07",
            "2021-08",
            "2021-09",
            "2021-10",
            "2021-11",
            "2021-12",
            "2022-01",
            "2022-02",
            "2022-03"
        ];
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


        $category_ids = $this->get_item_categories();

        foreach ($category_ids as $category_id_1) {
            $category_id = $category_id_1->id;
            $category_name[$category_id] = $category_id_1->category_name;
            $category_item[$category_id] = $this->get_category_count_mem($category_id,$id);
        }

       // 顧客名一覧を取得
        $members_lists = $this->get_members_list();
    
        return view('sales_management.analysis', compact(
            'points',
            'label',
            'sum_sales',
            'category_name',
            'category_item',
            'members_lists'
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

        // 商品カテゴリーを取得
        $item_categories = $this->get_item_categories();



        return view('sales_management.price-edit', ['point' => $point, 'item_categories' => $item_categories, 'members_lists' => $members_lists]);
    }

    /**
     * 売上を更新
     */
    public function exe_update_price(Request $request, $id)
    {
        // 更新日時の取得
        $updated_at = new Carbon('now');

        // 該当データの取得
        $point = Point_sale::find($id);

        $point->member_id = $request->member_id;
        $point->category_id = $request->category_id;
        $point->date = $request->date;
        $point->sale = $request->sale;
        $point->get_point = $request->get_point;
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

        $point->delete();

        return redirect(route('show_analysis'))->with('flashmessage', '削除しました');
    }






    /**
     * 月別売上
     */
    public function get_month_sales($month)
    {

        $record = DB::table('points')
            ->where("date", "like", $month . "%")
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
            ->join('members_lists', 'points.member_id', '=', 'members_lists.id')
            ->where("date", "like", $month . "%")
            ->where('members_lists.id', $id)
            ->get();

        
        $count = $record->count();
        $sum = 0;

        for ($i = 0; $i < $count; $i++) {
            $sum = $record->sum("sale");
        }

        return $sum;
    }

    public function get_count_category($category_id)
    {
    
        $category = DB::table('points')
            ->where('category_id', '=', $category_id->id)
            ->get();

        $count = $category->count();

        return $count;
    }



    /**
     * 顧客名と保有ポイント取得
     * 
     * @return array $point
     */
    public function get_sum_points()
    {

        $points = DB::table('points')
            ->join('members_lists', 'points.member_id', '=', 'members_lists.id')
            ->select('members_lists.club_name', DB::raw("sum(points.get_point) as total_points"))
            ->groupBy('members_lists.id')
            ->get();

        return $points;
    }



    /**
     * 売上一覧データ取得
     */
    public function get_sales_list()
    {
        $points = DB::table('points')
            ->join('members_lists', 'points.member_id', '=', 'members_lists.id')
            ->join('item_categories', 'points.category_id', '=', 'item_categories.id')
            ->select('points.*', 'members_lists.club_name', 'item_categories.category_name')
            ->get();

        return $points;
    }



    /**
     * 売上一覧データ取得（顧客別）
     */
    public function get_sale_list($id)
    {
        $points = DB::table('points')
            ->join('members_lists', 'points.member_id', '=', 'members_lists.id')
            ->join('item_categories', 'points.category_id', '=', 'item_categories.id')
            ->select('points.*', 'members_lists.club_name', 'item_categories.category_name')
            ->where('members_lists.id', $id)
            ->get();

        return $points;
    }



    /**
     * 売上詳細データ取得
     */
    public function get_sale_data($id)
    {
        $point = DB::table('points')
            ->join('members_lists', 'points.member_id', '=', 'members_lists.id')
            ->join('item_categories', 'points.category_id', '=', 'item_categories.id')
            ->select('points.*', 'members_lists.club_name', 'category_name')
            ->where('points.id', $id)
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



    /**
     * 商品カテゴリーを取得
     */
    public function get_item_categories()
    {
        $item_categories = DB::table('item_categories')
            ->select('*')
            ->get();

        return $item_categories;
    }



    /**
     * 商品カテゴリーを集計
     */
    public function get_category_count($category_id)
    {
        $category_count =  DB::table('points')
        ->where('category_id','=',$category_id)
        ->count();

        return $category_count;
    }



    /**
     * 商品カテゴリーを集計（顧客別）
     */
    public function get_category_count_mem($category_id,$id)
    {
        $category_count =  DB::table('points')
        ->join('members_lists', 'points.member_id', '=', 'members_lists.id')
        ->where('category_id','=',$category_id)
        ->where('members_lists.id', $id)
        ->count();

        return $category_count;
    }

    
}
