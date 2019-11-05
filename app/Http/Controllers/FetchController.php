<?php

namespace App\Http\Controllers;

use App\Exports\TripExport;
use App\Http\Resources\PositionCollection;
use App\Models\Trip;
use App\Models\Vehicle;
use DB;
use Excel;
use Illuminate\Support\Arr;
use Storage;

class FetchController extends Controller
{

    /**
     * Trip list view
     *
     * @return     array  Trips collections
     */
    public function tripList()
    {
        $trips = Trip::get();

        return View('trip.list', ['trips' => $trips]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportTrip($id)
    {
        $dt = \Carbon\Carbon::now();
        $dateFormat = $dt->format('Ymd-his');
        $data = Trip::with('positions')->find($id);

        return Excel::download(new TripExport($data->positions), "trips-{$dateFormat}.csv");
    }

    /**
     * Fetches a data.
     */
    public function fetchData()
    {
        $vehicle = Vehicle::find(1); // data for test purpose

        // get data
        $json = Storage::disk('public')->get('vehicle-trip-20190223.json');
        $datas = json_decode($json, true);

        // format data
        $collections = collect($datas['trips'])->transform(function ($data) use ($vehicle) {
            $positionCollections = collect($data['histories']);
            $positions = new PositionCollection($positionCollections);

            return [
                    'trips' => [
                        'id' => $data['id'],
                        'vehicle_id' => $vehicle->id,
                        'start' => json_encode($data['start']),
                        'end' => json_encode($data['end']),
                        'distance' => $data['distance'],
                        'duration' => $data['duration'],
                        'max_speed' => $data['max_speed'],
                        'average_speed' => $data['average_speed'],
                        'idle_duration' => $data['idle_duration'],
                        'score' => $data['score'],
                        'idles' => json_encode($data['idles']),
                        'violations' => json_encode($data['violations'])
                    ],
                    'positions' => empty($data['histories']) ? [] : $positions->map(function ($p) use ($data) {
                        $p['trip_id'] = $data['id'];
                        return $p;
                    })
                ];
        }); 

        // gathering data into category (trips and positions)
        foreach ($collections->all() as $c) {
            $trips[] = $c['trips'];
            foreach ($c['positions'] as $key => $val) {
                $positions[] = $val;
            }
        }

        $summary = array_merge(['vehicle_id' => 1], $datas['summary']);
        $duration = array_merge(['vehicle_id' => 1], $datas['duration']);

        DB::table('trips')->truncate();
        DB::table('positions')->truncate();
        DB::table('summaries')->truncate();
        DB::table('durations')->truncate();

        // inserting to db
        if (DB::table('trips')->insert($trips)){
            echo("Saving Trips Success. \n");
        } else {
            echo("Saving Trips Failed. \n");
        }

        if (DB::table('positions')->insert($positions)) {
            echo("Saving Positions Success. \n");
        } else {
            echo("Saving Positions Failed. \n");
        }

        if (DB::table('summaries')->insert($summary)) {
            echo("Saving Summary Success. \n");
        } else {
            echo("Saving Summary Failed. \n");
        }

        if (DB::table('durations')->insert($duration)) {
            echo("Saving Duration Success. \n");
        } else {
            echo("Saving Duration Failed. \n");
        }
    }

}
