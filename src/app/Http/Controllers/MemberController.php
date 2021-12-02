<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member_list;
use App\User;
use App\Http\Requests\StoreMember;
use App\Http\Requests\UpdateMember;

class MemberController extends Controller
{
    //**顧客一覧 */
    public function members(Request $request)
    {
        // $members= DB::table('members_lists')->get();
            
        // $nsd = DB::table('members_lists')
        //         ->join('points', 'members_lists.id', '=', 'points.members_id')
        //         ->select ('members_lists.id', 'points.created_at')
        //         ->max('points.created_at');
          
        // return view('members/memberlist', [
        //     'members' => $members,
        //     'nsd' => $nsd,
        // ]);
        $members = DB::table('members_lists')
            ->leftJoin('points', 'members_lists.id', '=', 'points.members_id')
            ->groupBy('members_lists.id')
            ->orderBy('members_lists.id')
            ->select('members_lists.id', 'members_lists.club_name', DB::raw('MAX(points.created_at) as created_at'))
            ->get();
        return view('members/memberlist', [
            'members' => $members
        ]);

    }


    //**新規登録 */
    public function sign_up(Request $request)
    {
        return view('members/sign_up');
    }
    /**新規保存 */
    public function store(Request $request)
    {
        $member = new Member_list;

        $request->validate([
            'club_name'=>'required|max:64',
            'email'=>'required|max:254|unique:members_lists',
            'address'=>'required|max:64|unique:members_lists',
            'name'=>'required|max:64|unique:members_lists',
            'tel'=>'required|max:11|unique:members_lists',
        ]);

        //$memo = isset($request->memo) ? $request->memo : "";
        $fax = $request->fax ?? "";
        $memo = $request->memo ?? "";
        //$memo = 条件式 ? 式1 : 式2

        $member->club_name = $request->club_name;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->name = $request->name;
        $member->tel = $request->tel;
        $member->fax = $fax;
        $member->memo = $memo;

        $member->save();

        return redirect('members/memberlist')->with('flash_message', '登録が完了しました');

    }

    public function detail($id)
    {
        $member = Member_list::find($id);
        return view('members/detail', compact('member'));
        // $view = view('members.detail');
        // $view->with('member', $member);
        // return $view;
    }

    public function edit($id)
    {
        $member = Member_list::find($id);
        return view('members/edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member_list::find($id);

        $member->club_name = $request->input('club_name');
        $member->email = $request->input('email');
        $member->address = $request->input('address');
        $member->name = $request->input('name');
        $member->tel = $request->input('tel');
        $member->fax = $request->input('fax');
        $member->memo = $request->input('memo');

        $member->save();

        return redirect()->route('memberlist');
    }

    public function delete($id)
    {
        $member = Member_list::find($id);
        return view('members/delete', compact('member'));
    }

    public function destroy($id)
    {
        $member = Member_list::find($id);
        $member->delete();
        return redirect('members/memberlist');
    }
}
