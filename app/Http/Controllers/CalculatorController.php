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
    public function logs() {
       $vmc = new calculator();
        // to get all records with some conditions on where 
       $data=$vmc->all();

        return view('calculator.logs')->with('data',$data);

    }
      
     public function queries() {

         // this will return all the records
        $vmc = new calculator();
      //filter = all => list all data
       //filter = first => display first record
       //filter = last => display last record
       //filter = top, value=3 => display top 3 records
       // filter = reverse => display values in reverse order
       $filter = request()->get('filter');   
       $value = request()->get('value');  
    
        if($filter == 'all'){
          $data=$vmc->all();
            echo "All records " .$data->count(). "<br>";
     
            foreach($data as $d){
                echo "id - ". $d->id . " <<>> ";
                echo "a - ". $d->a . " <<>> ";
                echo "b - ". $d->b . " <<>> "; 
                echo "opr - ". $d->opr . " <<>> ";
                echo "created_at - ". $d->created_at . "<br>";
            }
        }
          // this will return first record
        if($filter == 'first'){
            echo "First record <br> "; 
            $d = $vmc->first();
            echo "id - ". $d->id . "<br>";
            echo "a - ". $d->a . "<br>";
            echo "b - ". $d->b . "<br>";
            echo "opr - ". $d->opr . "<br>";
            echo "created_at - ". $d->created_at . "<br>";
        }

        // return view('calculator.logs')->with('data',$data);

        // this will return last record
        if($filter == 'last'){
            echo "Last record <br> "; 
          $d = $vmc->orderby ('id','desc')->first();
            echo "id - ". $d->id . "<br>";
            echo "a - ". $d->a . "<br>";
            echo "b - ". $d->b . "<br>";
            echo "opr - ". $d->opr . "<br>";
            echo "created_at - ". $d->created_at . "<br>";
        } 

        //this will return top 3 records
        if($filter == 'top3'){
            $data=$vmc->limit(3)->get();
            echo "Top 3 records " .$data->count(). "<br>";

            foreach($data as $d){
               echo "id - ". $d->id . " <<>> ";
               echo "a - ". $d->a . " <<>> ";
               echo "b - ". $d->b . " <<>> ";
               echo "opr - ". $d->opr . " <<>> ";
               echo "created_at - ". $d->created_at . "<br>";
            }
        }

        //this will return reverse order records
        if($filter == 'reverse') {
            $data=$vmc->orderby('id','desc')->get();
            echo "Reverse order records " .$data->count(). "<br>";

            foreach($data as $d){
                echo "id - ". $d->id . " <<>> ";
                echo "a - ". $d->a . " <<>> ";
                echo "b - ". $d->b . " <<>> ";
                echo "opr - ". $d->opr . " <<>> ";
                echo "created_at - ". $d->created_at . "<br>";
            }
        }
    }
} 
         // return view ('calculator.logs')->with('data',$data
    
