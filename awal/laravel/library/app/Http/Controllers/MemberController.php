<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.member', ['members' => Member::all()]);
    }

    public function api()
    {
        return datatables()->of(Member::all())->addIndexColumn()
            ->addColumn('showGenderName', function($data) {
                if($data->gender == 'M'){
                    return 'Male';
                }else{
                    return 'Female';
                }
            })->addColumn('date_added', function($data) {
                return convert_date($data->created_at);
            })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:64',
            'gender' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
            'email' => 'required|email|unique:members,email|max:64',
        ]);

        Member::create($attributes);

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $attributes = $request->validate([
            'name' => 'required|max:64',
            'gender' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
            'email' => ['required', 'max:64', Rule::unique('members', 'email')->ignore($member)],
        ]);

        $member->update($attributes);

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index');
    }
}
