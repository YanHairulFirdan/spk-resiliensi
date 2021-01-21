<?php

namespace App\Http\Controllers;

use App\Aspect;
use App\CustomClass\ScoreCalculation;
use App\Score;
use App\Statement;
use App\Tip;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Quizcontroller extends Controller
{

    protected $aspectsArr = [
        'regulasi_emosi',
        'pengendalian_impuls',
        'optimis',
        'percaya_diri',
        'analisis_kausal',
        'empati',
        'reaching_out'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $aspectsArr = $this->aspectsArr;
        $aspects =  Aspect::get();
        $options = [
            'sangat tidak setuju',
            'tidak setuju',
            'setuju',
            'sangat setuju'
        ];

        // dd($aspects);
        return view('kuisioners.kuisioner', compact(['aspects', 'aspectsArr', 'options']));
    }
    public function saveQuiz(Request $request)
    {
        $this->scoreCalculation($request->except(['_token']));
        return redirect('/hasil');
    }
    public function motivationForm()
    {
        return view('kuisioners.motivasi');
    }
    public function savemotivationForm()
    {
        return redirect('/kuisioner');
    }

    public function result()
    {
        $labels = Aspect::with(['tips'])->get();
        $labelChart = Aspect::with(['tips'])->get()->pluck('aspect');
        $scores = [];
        $score =  Score::where('user_id', auth()->user()->id)->get()->toArray();
        foreach ($this->aspectsArr as $key => $aspect) {
            if (array_key_exists($aspect, $score[0])) {
                $scores[$key] = $score[0][$aspect];
            }
        }
        $scores = collect($scores);
        return view('kuisioners.result', compact(['scores', 'labels', 'labelChart']));
    }

    public function scoreCalculation($request)
    {
        $aspectGroup = [];
        $final_score = 0;

        foreach ($this->aspectsArr as $key => $singleAspect) {
            foreach ($request as $parentkey => $inputvalue) {
                if (preg_match('/' . $singleAspect . '/', $parentkey)) {
                    if (!isset($aspectGroup[$singleAspect])) {
                        $aspectGroup[$singleAspect] = 0;
                    }
                    $aspectGroup[$singleAspect] += $inputvalue;
                    // echo $inputvalue . "<br>";
                }
            }
            // += $aspectGroup[$singleAspect];
        }
        // dd($aspectGroup);
        $final_score = ($final_score / count($request)) * 100;
        $existingData = Score::where('user_id', auth()->user()->id);
        if ($existingData->exists()) {
            $existingData->update([
                'pengendalian_impuls' => $aspectGroup['pengendalian_impuls'],
                'regulasi_emosi' => $aspectGroup['regulasi_emosi'],
                'optimis' => $aspectGroup['optimis'],
                'percaya_diri' => $aspectGroup['percaya_diri'],
                'analisis_kausal' => $aspectGroup['analisis_kausal'],
                'empati' => $aspectGroup['empati'],
                'reaching_out' => $aspectGroup['reaching_out'],
                'final_score' => $final_score
            ]);
        } else {
            Score::create([
                'user_id' => auth()->user()->id,
                'pengendalian_impuls' => $aspectGroup['pengendalian_impuls'],
                'regulasi_emosi' => $aspectGroup['regulasi_emosi'],
                'optimis' => $aspectGroup['optimis'],
                'percaya_diri' => $aspectGroup['percaya_diri'],
                'analisis_kausal' => $aspectGroup['analisis_kausal'],
                'empati' => $aspectGroup['empati'],
                'reaching_out' => $aspectGroup['reaching_out'],
                'final_score' => $final_score
            ]);
        }
    }
}
