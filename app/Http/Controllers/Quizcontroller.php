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
        // dd($scores);


        return view('kuisioners.result', compact(['scores', 'labels', 'labelChart']));
    }

    public function scoreCalculation($request)
    {
        $types = ['positive', 'negative'];
        $datas = [];
        $scores = [];
        $aspects = Aspect::with(['statements'])->get();
        $temp = 0;
        $tempScore = 0;
        $aspectGroup = [];
        // for ($i=0; $i < ; $i++) { 
        //     # code...
        // }
        $existingData = Score::where('user_id', auth()->user()->id);

        if ($existingData) {
            $existingData->delete();
        }
        foreach ($this->aspectsArr as $key => $singleAspect) {
            $aspectGroup[$singleAspect] = [];
            $iteration = $aspects[$temp]->statements->count();
            $numberOfNegative = 0;
            $numberOfPositive = 0;

            for ($i = 0; $i < $iteration; $i++) {
                foreach ($types as $key => $type) {
                    if (!isset($aspectGroup[$singleAspect][$type])) {
                        $aspectGroup[$singleAspect][$type] = 0;
                    }
                    if (array_key_exists($singleAspect . '_' . $type . '_' . $i, $request)) {
                        $aspectGroup[$singleAspect][$type] += $request[$singleAspect . '_' . $type . '_' . $i];
                    }
                    ($type == 'positive') ? $numberOfPositive++ : $numberOfNegative++;
                }
            }
            $final_score = ($numberOfPositive > $numberOfNegative) ? $numberOfPositive - $numberOfNegative : $numberOfNegative - $numberOfPositive;
            // dd($newCollection);
            DB::table('scores')->insert(
                [
                    'user_id' => auth()->user()->id,
                    'aspect_name' => $singleAspect,
                    'score_positive' => ($aspectGroup[$singleAspect]['positive'] / ($numberOfPositive * 4)) * 100,
                    'score_negative' => ($aspectGroup[$singleAspect]['negative'] / ($numberOfNegative * 4)) * 100,
                    'final_score' => $final_score
                ]
            );
            // Score::create([
            //     'user_id' => auth()->user()->id,
            //     'score_positive' => ($aspectGroup[$singleAspect]['positive'] / ($numberOfPositive * 4)) * 100,
            //     'aspect_name' => $singleAspect,
            //     'score_negative' => ($aspectGroup[$singleAspect]['negative'] / ($numberOfNegative * 4)) * 100,
            //     'final_score' => $final_score
            // ]);
            // $datas[$singleAspect] = ($tempScore / ($iteration * 4)) * 100;
            // $tempScore = 0;
            // $temp++;
        }
        dd($aspectGroup);


        // foreach ($aspectGroup as $key => $aspect) {
        //     Score::create([
        //         'user_id' => auth()->user()->id,
        //         'aspect_name' => $key,
        //         'score_positive' => ($aspect['positive'] / ())
        //     ])
        // }

        dd($aspectGroup);
        // $existingData = Score::where('user_id', auth()->user()->id);
        // if ($existingData->exists()) {
        //     $existingData->update([
        //         'pengendalian_impuls' => $datas['pengendalian_impuls'],
        //         'regulasi_emosi' => $datas['regulasi_emosi'],
        //         'optimis' => $datas['optimis'],
        //         'percaya_diri' => $datas['percaya_diri'],
        //         'analisis_kausal' => $datas['analisis_kausal'],
        //         'empati' => $datas['empati'],
        //         'reaching_out' => $datas['reaching_out']
        //     ]);
        // } else {
        //     Score::create([
        //         'user_id' => auth()->user()->id,
        //         'pengendalian_impuls' => $scores['pengendalian_impuls'],
        //         'regulasi_emosi' => $scores['regulasi_emosi'],
        //         'optimis' => $scores['optimis'],
        //         'percaya_diri' => $scores['percaya_diri'],
        //         'analisis_kausal' => $scores['analisis_kausal'],
        //         'empati' => $scores['empati'],
        //         'reaching_out' => $scores['reaching_out']
        //     ]);
        // }
    }
}
