<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Engineer;

class EngineerController extends Controller
{


	public function all(){
		return Engineer::all();
	}


    /**
     * Display the specified resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search()
    {


		$engineers = new Engineer;

    	$engineers = is_null(request()->limit) ? 
    				$engineers : $engineers::limit(request()->limit);

    	$engineers = is_null(request()->city) ? 
    				$engineers : $engineers->where('city', request()->city);

    	$engineers = is_null(request()->village) ? 
    				$engineers : $engineers->where('village', request()->village);

    	$engineers = is_null(request()->profession) ? 
    				$engineers : $engineers->where('profession', request()->profession);


    	$engineers = $engineers->where('status', '>', 0)->get();
    	

    	
        return response()->json($engineers, 200); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function update(EngineerRequest $request, Engineer $engineer)
    {
        $update = $request->RequestValidation();
        if($update)
        {
            $request->updateThe($engineer);
            return Response::updatedSuccessful();
        }
        return $request->failed();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Engineer $engineer)
    {
        $engineer->delete();
        return Response::droppedSuccessful();
    }

    public function accommodations()
    {
        return response()->json([
           'profession' => Engineer::groupBy('profession')->pluck('profession'),
           'village' => Engineer::groupBy('village')->pluck('village'),
           'city' => Engineer::groupBy('city')->pluck('city'),
        ], 200); 
    }

}
