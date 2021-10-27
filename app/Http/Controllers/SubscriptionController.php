<?php
namespace App\Http\Controllers;

use App\Models\SubscriberWebsite;
use App\Models\Websites;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Exception;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscriber_id' => 'required|numeric|exists:subscribers,id',
            'website_id' => 'required|numeric|exists:websites,id'
        ]);

        if ($validator->fails()) {
            $respose = ['status' => false, 'message' => $validator->errors()];
            return Response::json($respose, 400);
        }

        try {
            $subscriptionWebsite = new SubscriberWebsite();
            $subscriptionWebsite->subscriber_id = $request->subscriber_id;
            $subscriptionWebsite->website_id = $request->website_id;
            $subscriptionWebsite->save();
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

        $respose = ['status' => true, 'message' => 'You have successfully subscribed!'];
        return Response::json($respose);
    }
}
