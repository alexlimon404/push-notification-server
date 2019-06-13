<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscribers;
use App\Models\Browser;
use App\Models\BrowserVersion;
use App\Models\City;
use App\Models\Country;
use App\Models\DeviceModel;
use App\Models\Language;
use App\Models\Operator;
use App\Models\OS;
use App\Models\OSVersion;
use App\Models\Region;
use App\Models\Source;
use App\Models\UserAgent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index (Request $request)
    {
        return $request->user();
    }
    public function create (Request $request, $serverKeyId)
    {
        $subscriber = new Subscribers();
        $subscriber->token = $request->token;
        $subscriber->ip = $request->ip;
        $subscriber->device_type = $request->device_type;
        $subscriber->connection_type = $request->connection_type;
        $subscriber->server_key_id = $serverKeyId;
        $subscriber->browser_id = Browser::createOrNew($request->browser);
        $subscriber->browser_version_id = BrowserVersion::createOrNew($request->browser_version);
        $subscriber->city_id = City::createOrNew($request->city);
        $subscriber->country_id = Country::createOrNew($request->country);
        $subscriber->device_model_id = DeviceModel::createOrNew($request->device_model);
        $subscriber->language_id = Language::createOrNew($request->language);
        $subscriber->operator_id = Operator::createOrNew($request->operator);
        $subscriber->os_id = OS::createOrNew($request->os);
        $subscriber->os_version_id = OSVersion::createOrNew($request->os_version);
        $subscriber->region_id = Region::createOrNew($request->region);
        $subscriber->source_id = Source::createOrNew($request->source);
        $subscriber->user_agent_id = UserAgent::createOrNew($request->user_agent);
        $subscriber->save();
        return $subscriber;
    }
}
