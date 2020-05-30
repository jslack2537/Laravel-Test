<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;

class CalculatorController extends Controller
{
    public function calculatefunc(Request $request)
    {
        $operator = $request->input('operator');
        $first_number = $request->input('first');
        $second_number = $request->input('second');
        $result = $this->calculateByOperator($operator, $first_number, $second_number);

        return redirect('/')->with('info', 'Answer: ' . $result);
    }

    private function calculateByOperator($operator, $first_number, $second_number)
    {
        if ($operator == "plus") {
            $result = $first_number + $second_number;
        } elseif ($operator == "minus") {
            $result = $first_number - $second_number;
        } elseif ($operator == "multiply") {
            $result = $first_number * $second_number;
        } elseif ($operator == "divide") {
            $result = $first_number / $second_number;
        } else {
            $result = 0;
        }

        return $result;
    }

    public function postResultCreate(Request $request)
    {
        $first_number = $request->input('first');
        $second_number = $request->input('second');
        $operator = $request->input('operator');
        $result = $this->calculateByOperator($operator, $first_number, $second_number);
        $post = new Result([
            'first_number' => $first_number,
            'second_number' => $second_number,
            'operator' => $operator,
            'sum' => $result

        ]);
        $post->save();
        return redirect('/')->with('info', 'Answer: ' . $result);
    }

    public function index()
    {
        $results = Result::all();
        return view('welcome')->with('results', $results);
    }
}

