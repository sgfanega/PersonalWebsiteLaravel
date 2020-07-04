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
            $python_script_output = $this->getPythonScript($request->ticker_symbol, strval($request->forecast_days), $request->machine_learning_type);
            
            // Chart Labels Remove Confidence
            $labels = $this->getLabelArrayFromPythonScript($python_script_output);
            unset($labels[0]);
            $labels = array_values($labels);

            // Chart Data Remove Confidence
            $predictions = $this->getPredictionArrayFromPythonScript($python_script_output);
            unset($predictions[0]);
            $predictions = array_values($predictions);


            $test_array = ['Something', 'Something New'];
            $chartjs = app()->chartjs
            ->name('StockPredictor')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => $request->ticker_symbol . " Predictions USD",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $predictions,
                ]
            ])
            ->options([]);

            return view('stockpredictor.index')->with('chartjs', $chartjs);
        }

        return view('stockpredictor.index');
    }

    /**
     * Get the Python Script Output
     * 
     * @return string $result
     */
    public function getPythonScript(string $ticker_symbol, string $forecast_days, string $machine_learning_type)
    {
        $process = new Process(['python', public_path() . '\storage\python\StockPredictor.py', 'MSFT', '10', 'LR']);
        $process->run();

        //  executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = strstr($process->getOutput(), "{");
        
        // Checks if the result is json_decodeable, if not the ticker symbol is not valid
        if($result = json_decode($result, true)) {
            return $result;
        }

        // Returns to the same page with tickery symbol error
        return redirect()->back()->with('error', 'Not a valid Stock Ticker Symbol');
    }

    /**
     * Get the labels of the Python Script Output
     * 
     * @return array $labels
     */
    public function getLabelArrayFromPythonScript($json_array)
    {
        foreach ($json_array as $key => $prediction) {
            $labels[] = $key;
        }

        return $labels;
    }

    /**
     * Get the predictions of the Python Script Output
     * 
     * @return array $predictions
     */
    public  function getPredictionArrayFromPythonScript($json_array)
    {
        foreach ($json_array as $key => $prediction) {
            $predictions[] = $prediction;
        }

        return $predictions;
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

        return redirect('/stockpredictor?ticker_symbol=' 
            . $request->ticker_symbol
            . '&forecast_days='
            . $request->forecast_days
            . '&machine_learning_type='
            . $request->machine_learning_type);
    }

    /**
     * Use Symfony Component Process
     */
    public function useSymfonyProcess()
    {
        $process = new Process(['python', public_path() . '\storage\python\StockPredictor.py', 'MSFT', '10', 'LR']);
        $process->run();

        //  executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
