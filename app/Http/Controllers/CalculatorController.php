<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calculator;

use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{
    //show method will display one record based on id
    public function show($id){
        $alert = request()->session()->get('alert');
        // $record = DB::table('calculators')->where('id',$id)->first();
        $record = DB::table('calculators')->find($id);
        // dd($record);
        return view ('calculator.show')
                    ->with ('data',$record)
                    ->with('alert',$alert);;
    }

    //update method will display to update one record based on id
    // shows it to user in the form page
    public function update($id){

        $record = Calculator::find($id);
        return view ('calculator.update')->with('data',$record);

    }

    // savedata will update the values to database
    public function savedata($id){

        $record = Calculator::find($id);

        $record->a = request()->get('a');
        $record->b = request()->get('b');
        $record->opr = request()->get('opr');

        if(request()->get('opr') == 'add')
            $record->result = $record->a + $record->b;
        else if(request()->get('opr') == 'subtract')
            $record->result = $record->a - $record->b;
        else if(request()->get('opr') == 'multiply')
            $record->result = $record->a * $record->b;

        $record->save();

        $alert = "You have Successfully updated the record(".$record->id.")";
        return redirect()->to('calculator/show/'.$id)
                         ->with('alert',$alert);
        // dd($data);

    }

    public function destroy($id){

        $record = Calculator::find($id);
        if($record)
        $record->delete();
        return redirect()->to('calculator/logs');
    }
    
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
            echo "<b>Top 3 records " .$data->count(). "</b><br>";

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

        // Aggregate function
        if($filter == 'a') {
            if($value =='sum')
                $data = $vmc->sum('a');
            else if($value =='min')
                $data = $vmc->min('a');
            else if( $value == 'max')
                $data = $vmc->max('a');
            else if( $value == 'avg')
                $data = $vmc->avg('a');

            echo "Column (".$filter.")<br><br>Operation(".$value.")<br><br>Result : ".$data;
        }

        // Pluck
        if($filter == 'pluck') {
            $data = $vmc->pluck($value);
            dd($data);
        }

        // Group By
        if($filter == 'groupby') {
            $data = $vmc->get()->groupby('opr');
        //     dd($data);
        }
    }
} 
         // return view ('calculator.logs')->with('data',$data)
    
