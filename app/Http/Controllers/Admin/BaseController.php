<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $mainRepo;
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $response = [
            'status' => 'successful',
            'results' => []
        ];
        $response['results'] = $this->mainRepo->getAll($request->all(), true);
        return response()->json($response);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectById($id)
    {
        $response = [
            'status' => 'successful',
            'results' => []
        ];
        $response['results'] = $this->mainRepo->selectById($id);
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [
            'status' => 'fail',
            'message' => ''
        ];

        $retval = $this->mainRepo->delete($id);

        if ($retval) {
            $response = [
                'status' => 'successful',
                'message' => 'Deleted success'
            ];
        }
       return response()->json($response);
    }

    public function uploadImage(Request $request) {
        $retVal = [
            'status' => 'fail'
        ];
        list($status, $message) = $this->pageRepository->validateImage($request->toArray());
        if ($status) {
            $imageUrl = $this->pageRepository->uploadImage($request);
            if (!empty($imageUrl)) {
                $retVal = [
                    'status' => 'successful',
                    'result' => $imageUrl,
                    'link' => $imageUrl
                ];
            }
        } else {
            $retVal['message'] = $message;
        }
        
        return $retVal;
    }
    
}
