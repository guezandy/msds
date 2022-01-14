<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function csvToJson($fname) {
        // open csv file
        if (!($fp = fopen($fname, 'r'))) {
            die("Can't open file...");
        }
        
        //read csv headers
        $key = fgetcsv($fp,"1024",",");
        
        // parse csv rows into array
        $json = array();
            while ($row = fgetcsv($fp,"1024",",")) {
            $json[] = array_combine($key, $row);
        }
        
        // release file handle
        fclose($fp);
        
        // encode array to json
        return $json;
    }


    // Returns data for dashboard page
    public function index($vessel, $file)
    {
        $filename = $file . ".csv";
        $path = storage_path() . "/app/json/${filename}";
        $file_data = $this->csvToJson($path);
        
        $humidity_timeseries = array();
        $yaw_timeseries = array();
        $roll_timeseries = array();
        $pitch_timeseries = array();
        $accel_x_timeseries = array();
        $accel_y_timeseries = array();
        $accel_z_timeseries = array();
        $compass_x_timeseries = array();
        $compass_y_timeseries = array();
        $compass_z_timeseries = array();
        $gyro_x_timeseries = array();
        $gyro_y_timeseries = array();
        $gyro_z_timeseries = array();
        $pressure_timeseries = array();
        $temperature_timeseries = array();

        foreach($file_data as $data_point) {
            array_push($humidity_timeseries, $data_point['humidity']);
            array_push($yaw_timeseries, $data_point['yaw']);
            array_push($roll_timeseries, $data_point['roll']);
            array_push($pitch_timeseries, $data_point['pitch']);
            array_push($accel_x_timeseries, $data_point['accel_x']);
            array_push($accel_y_timeseries, $data_point['accel_y']);
            array_push($accel_z_timeseries, $data_point['accel_z']);
            array_push($compass_x_timeseries, $data_point['compass_x']);
            array_push($compass_y_timeseries, $data_point['compass_y']);
            array_push($compass_z_timeseries, $data_point['compass_z']);
            array_push($gyro_x_timeseries, $data_point['gyro_x']);
            array_push($gyro_y_timeseries, $data_point['gyro_y']);
            array_push($gyro_z_timeseries, $data_point['gyro_z']);
            array_push($pressure_timeseries, $data_point['pressure']);
            array_push($temperature_timeseries, $data_point['temperature']);
        }
        return view('index')
            ->with("vessel", $vessel)
            ->with("filename", $filename)
            ->with("humidity_timeseries", json_encode($humidity_timeseries, JSON_NUMERIC_CHECK))
            ->with("yaw_timeseries", json_encode($yaw_timeseries, JSON_NUMERIC_CHECK))
            ->with("roll_timeseries", json_encode($roll_timeseries, JSON_NUMERIC_CHECK))
            ->with("pitch_timeseries", json_encode($pitch_timeseries, JSON_NUMERIC_CHECK))
            ->with("accel_x_timeseries", json_encode($accel_x_timeseries, JSON_NUMERIC_CHECK))
            ->with("accel_y_timeseries", json_encode($accel_y_timeseries, JSON_NUMERIC_CHECK))
            ->with("accel_z_timeseries", json_encode($accel_z_timeseries, JSON_NUMERIC_CHECK))
            ->with("compass_x_timeseries", json_encode($compass_x_timeseries, JSON_NUMERIC_CHECK))
            ->with("compass_y_timeseries", json_encode($compass_y_timeseries, JSON_NUMERIC_CHECK))
            ->with("compass_z_timeseries", json_encode($compass_z_timeseries, JSON_NUMERIC_CHECK))
            ->with("gyro_x_timeseries", json_encode($gyro_x_timeseries, JSON_NUMERIC_CHECK))
            ->with("gyro_y_timeseries", json_encode($gyro_y_timeseries, JSON_NUMERIC_CHECK))
            ->with("gyro_z_timeseries", json_encode($gyro_z_timeseries, JSON_NUMERIC_CHECK))
            ->with("pressure_timeseries", json_encode($pressure_timeseries, JSON_NUMERIC_CHECK))
            ->with("temperature_timeseries", json_encode($temperature_timeseries, JSON_NUMERIC_CHECK));
    }


}
