<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;

class NewsController extends BaseController
{

    protected $newsRepo;

    public function __construct(NewsRepositoryInterface $newsRepo)
    {
        $this->newsRepo = $newsRepo;
        $this->mainRepo = $newsRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'pageTitle' => 'Tin tức'
        ];
        return view('admin.news.index', $params);
    }

    /**
     * Create the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [
            'status' => 'fail',
            'message' => ''
        ];
        
        $retval = $this->newsRepo->create($request->all());
        if ($retval) {
            $response = [
                'status' => 'successful',
                'message' => 'Created success',
                'results' => $retval
            ];
        }

        return response()->json($response);
    }

    /**
     * Create the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = [
            'status' => 'fail',
            'message' => ''
        ];
        
        $retval = $this->newsRepo->update($id, $request->all());
        if ($retval) {
            $response = [
                'status' => 'successful',
                'message' => 'Edit success',
                'results' => $retval
            ];
        }

        return response()->json($response);
    }
}
