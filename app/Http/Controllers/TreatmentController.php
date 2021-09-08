<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Treatment;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\User;

class TreatmentController extends Controller
{
    /**
     * list of Treatments
     * 
     * @return view
     */
    public function list()
    {
        $treatments = Treatment::all();

        foreach ($treatments as $treatment) {
            //formalize json Dentist
            $treatment->dentist->full_name = $treatment->dentist->user->name .' '. $treatment->dentist->user->surname;
            $treatment->dentist->email = $treatment->dentist->user->email;
            $treatment->dentist->makeHidden('user');
            $treatment->dentist->makeHidden('created_at');
            $treatment->dentist->makeHidden('updated_at');
            $treatment->dentist->makeHidden('user_id');

            //formalize json Patient
            $treatment->patient->full_name = $treatment->patient->user->name .' '. $treatment->patient->user->surname;
            $treatment->patient->email = $treatment->patient->user->email;
            $treatment->patient->makeHidden('user');
            $treatment->patient->makeHidden('created_at');
            $treatment->patient->makeHidden('updated_at');
            $treatment->patient->makeHidden('user_id');

            //formalize json Treatment
            $treatment->makeHidden('dentist_id');
            $treatment->makeHidden('patient_id');

            //change date format
            $treatment->created_at = $this->changeDateFormat($treatment->created_at);
            $treatment->updated_at = $this->changeDateFormat($treatment->updated_at);
            $treatment->ended_at = $this->changeDateFormat($treatment->ended_at);
        }

        return response()->json($treatments);
    }


    /**
     * changed the origin date format to "d-m-y" format
     * 
     * @param date
     * @return date
     */
    public function changeDateFormat($fecha)
    {
        if ($fecha) {
            return Carbon::parse($fecha)->format('d-m-Y');
        }
        else return null;
    }
}
