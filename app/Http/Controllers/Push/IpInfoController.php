<?php

namespace App\Http\Controllers\Push;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GeoIp2\Database\Reader;

class IpInfoController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('push.ip_info');
    }

    public function search(Request $request)
    {
        $readerISP = new Reader(storage_path('app\public\Geo\GeoIP2-ISP.mmdb'));
        $ISP = $readerISP->isp($request->ip);
        //dd($ISP);
        $readerCity = new Reader(storage_path('app\public\Geo\GeoLite2-City.mmdb'));
        $recordCity = $readerCity->city($request->ip);
        return redirect()->route('push_ip_info')->with([
            'ip' => $request->ip,
            'city' => $recordCity->city->name,
            'region' => $recordCity->mostSpecificSubdivision->name,
            'country' => $recordCity->country->name,
            'isp' => $ISP->isp,
        ]);
    }
}
