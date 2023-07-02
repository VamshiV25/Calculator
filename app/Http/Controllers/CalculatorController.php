<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calculator;

class CalculatorController extends Controller
{
    
    public function form(){

       return view ('calculator.form'); 

    }

    public function result() {

    // Capture All Data From The Request
        $a = request()->get('a');
        $b = request()->get('b');
        $opr = request()->get('opr');
        $result = null;

    // Process the Requested Operation(Business Logic)
        if($opr == 'add')
        $result = $a + $b ;
        else if($opr == 'subtract')
        $result = $a - $b ;
        else if($opr == 'multiply')
        $result = $a * $b ;

    // Save This Data in Database Table
        $vmc = new Calculator();  // Create Model Object
        $vmc->a = $a;
        $vmc->b = $b;
        $vmc->opr = $opr;
        $vmc->result = $result;
        $vmc->save();

        return view('calculator.result')
        ->with('result',$result)
        ->with('a',$a)
        ->with('b',$b)
        ->with('opr',$opr);
    }

    // this method is used for listing the logs from DB Table
    public function logs(){
        $vmc = new Calculator();
        $data = $vmc->all();

        // foreach ($data as $d) {
        //     echo $d->id."-";
        //     echo $d->a."-";
        //     echo $d->b."-";
        //     echo $d->opr."-";
        //     echo $d->result."-";
        //     echo $d->created_at."-";
        //     echo $d->updated_at;
        //     echo "<br>";
        // }
        return view ('calculator.logs')->with('data',$data);
    }
    
}
