<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class StockPredictorController extends Controller
{
    /**
     * Show the index for homepage
     * 
     * @return \Illuminate\Htpp\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->has('ticker_symbol'))) {
            $results = $this->getPythonScript($request->ticker_symbol, strval($request->forecast_days), $request->machine_learning_type);

            return view('stockpredictor.index')->with('results', $results);
        }
        return view('stockpredictor.index');
    }

    /**
     * Get the Python Script
     * 
     * @return string $result
     */
    public function getPythonScript(string $ticker_symbol, string $forecast_days, string $machine_learning_type)
    {
        $result = shell_exec("python "  . public_path() . "\storage\python\StockPredictor.py " 
            . $ticker_symbol . " "
            . $forecast_days . " "
            . $machine_learning_type . " 2>&1");

        return strstr($result, "{");
    }

    /**
     * Add Query Strings to Route
     * 
     * @return \Illuminate\Http\Response
     */
    public function addQueryStrings(Request $request)
    {
        $this->validate($request, [
            'ticker_symbol' => 'required',
            'forecast_days' => 'required',
            'machine_learning_type' => 'required'
        ]);

        return redirect('/steve?ticker_symbol=' 
            . $request->ticker_symbol
            . '&forecast_days='
            . $request->forecast_days
            . '&machine_learning_type='
            . $request->machine_learning_type);
    }
}
