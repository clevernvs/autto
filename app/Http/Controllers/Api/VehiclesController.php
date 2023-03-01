<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleCarColor;
use App\Models\VehicleCarSteering;
use App\Models\VehicleCubiccms;
use App\Models\VehicleDoor;
use App\Models\VehicleExchange;
use App\Models\VehicleFeatures;
use App\Models\VehicleFinancial;
use App\Models\VehicleFuel;
use App\Models\VehicleGearbox;
use App\Models\VehicleMotorpower;
use App\Models\VehicleRegdate;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiclesController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        //
    }

    private function getData()
    {
        return [
            'vehicle_types' => VehicleType::all(),
            'regdate' => VehicleRegdate::orderBy('label', 'ASC')->get(),
            'gearbox' => VehicleGearbox::all(),
            'fuel' => VehicleFuel::all(),
            'car_steering' => VehicleCarSteering::all(),
            'motorpower' => VehicleMotorpower::all(),
            'doors' => VehicleDoor::all(),
            'featues' => VehicleFeatures::all(),
            'car_color' => VehicleCarColor::all(),
            'exchange' => VehicleExchange::all(),
            'financial' => VehicleFinancial::all(),
            'cubiccms' => VehicleCubiccms::all(),
        ];
    }


    public function store(Request $request)
    {
        $vehicle = Vehicle::with('vehicle_photos')->firstOrCreate([
            'user_id' => $this->user->id,
            'status' => 0,
        ]);

        return array_merge(['vehicle' => $vehicle], $this->getData());
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
