<?php

namespace App\Http\Controllers;

use App\Answear;
use App\Aspect;
use App\Quisioner;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;


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
        $aspects =  Aspect::with(['statements'])->get();
        $options = [
            'Sangat setuju',
            'Setuju',
            'Netral',
            'Tidak setuju',
            'Sangat tidak setuju',
        ];

        $skor = [
            'positif' => [5, 4, 3, 2, 1],
            'negatif' => [1, 2, 3, 4, 5]
        ];
        return view('kuisioners.kuisioner', compact(['aspects', 'aspectsArr', 'options', 'skor']));
    }
    public function saveQuiz(Request $request)
    {
        $this->scoreCalculation($request->except(['_token']));
        return redirect('/hasil');
    }
    public function motivationForm()
    {
        $questions = Quisioner::get();
        return view('kuisioners.motivasi', compact('questions'));
    }
    public function savemotivationForm(Request $request)
    {
        // dd($request->except('_token'));
        $answearValidator = FacadesValidator::make(
            $request->except('_token'),
            [
                'answear_1' => 'required|min:8',
                'answear_2' => 'required|min:8',
                'answear_3' => 'required|min:8',
                'answear_4' => 'required|min:8',
                'answear_5' => 'required|min:8',
                'answear_6' => 'required|min:8',
            ],
            [
                'required' => 'harap isi bidang ini',
                'min' => 'jawaban anda terlalu pendek, jumlah minimal karakter untuk jawaban ini adalah 8 karakter'
            ]
        )->validate();
        Answear::updateOrCreate(['user_id' => (int)auth()->user()->id], $request->except('_token'));

        return redirect('/kuisioner');
    }

    public function result()
    {
        $labelChart = Aspect::get()->pluck('aspect');
        $scores = [];
        $score =  Score::where('user_id', auth()->user()->id)->get()->toArray();
        if (!$score) {
            return redirect('/');
        }
        $show = true;
        foreach ($this->aspectsArr as $key => $aspect) {
            if (array_key_exists($aspect, $score[0])) {
                $scores[$key] = $score[0][$aspect];
            }
        }
        $scores = collect($scores);
        $icons = collect([
            'low' => 'far fa-frown-open fa-2x',
            'good' => 'far fa-grin-alt fa-2x',
            'great' => 'far fa-grin-hearts fa-2x'

        ]);

        $labels = Aspect::with(['tips', 'links'])->get();
        return view('kuisioners.result', compact(['scores', 'icons', 'labels', 'labelChart']));
    }

    public function scoreCalculation($request)
    {
        $aspectGroup = [];
        $final_score = 0;
        $count = 0;
        foreach ($this->aspectsArr as $key => $singleAspect) {
            foreach ($request as $parentkey => $inputvalue) {
                if (preg_match('/' . $singleAspect . '/', $parentkey)) {
                    if (!isset($aspectGroup[$singleAspect])) {
                        $aspectGroup[$singleAspect] = 0;
                    }
                    $aspectGroup[$singleAspect] += $inputvalue;
                    $count++;
                }
            }
            $totalAspect = 5 * $count;
            $aspectGroup[$singleAspect] = ($aspectGroup[$singleAspect] / $totalAspect) * 100;
            $count = 0;
        }
        $final_score = ($final_score / count($request)) * 100;

        Score::updateOrCreate(['user_id' => auth()->id()], [
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
