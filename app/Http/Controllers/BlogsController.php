<?php
namespace App\Http\Controllers;

use App\Events\SendNotificationEvent;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Exception;
use Illuminate\Database\QueryException;

class BlogsController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_id' => 'required|numeric',
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            $respose = ['status' => false, 'message' => $validator->errors()];
            return Response::json($respose, 400);
        }

        try {
            $blog = new Blogs();
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->website_id = $request->website_id;
            $blog->save();

            $website = $blog->website()->get()->first();
            $subscribers = $website->subscribers()->get()->all();
            foreach ($subscribers as $subscriber){
                $userDetail = $subscriber->subscriber()->get()->first();
                event(new SendNotificationEvent($userDetail, $blog, $website));
            }
        }
        catch(QueryException $e){
            Log::error($e->getMessage());
            $respose = ['status' => false, 'message' => 'Something went wrong! Please try again.'];
            return Response::json($respose, 400);
        }
        catch(Exception $e){
            Log::error($e->getMessage());
            $respose = ['status' => false, 'message' => 'Something went wrong! Please try again.'];
            return Response::json($respose, 400);
        }

        $respose = ['status' => true, 'message' => 'Blog successfully added!'];
        return Response::json($respose);
    }
}
