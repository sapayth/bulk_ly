<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['today'] = date('F') . ' ' . date("d") . ', ' . date("Y");

        // echo '<pre>';
        // print_r($data['today']);
        // echo '</pre>';
        // die();

        $data['groups'] = DB::table('buffer_postings')
                        ->leftJoin('social_post_groups', 'buffer_postings.group_id', '=', 'social_post_groups.id')
                        ->select('social_post_groups.name AS group_name', 'buffer_postings.group_id AS group_id')
                        ->get();

        $data['posts'] = DB::table('buffer_postings')
                        ->leftJoin('social_post_groups', 'buffer_postings.group_id', '=', 'social_post_groups.id')
                        ->leftJoin('social_accounts', 'buffer_postings.account_id', '=', 'social_accounts.id')
                        ->select(
                            'buffer_postings.*',
                            'social_post_groups.name AS group_name',
                            'social_post_groups.type AS group_type',
                            'social_accounts.name AS social_account_name',
                            'social_accounts.avatar AS social_avatar'
                        )
                        ->paginate(10);
        return view('pages.posts')->with($data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtered_posts(Request $request) {
        // $datas = \App\YourModel::where('name', 'LIKE', '%' . $keyword . '%')
        // ->paginate();
        // if ($request->ajax()) {
        //     return \Response::json(\View::make('list', array('datas' => $datas))->render());
        // }

        // echo '<pre>';
        // print_r($request);
        // echo '</pre>';
        // $groupId = $request->input('groupId');
        return 'ajax found';
    }
}
