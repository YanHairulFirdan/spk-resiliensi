<?php

namespace App\Http\Controllers;

use App\Answear;
use App\Aspect;
use App\Http\Requests\QuizRequest;
use App\Quisioner;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;

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
        $aspects =  Aspect::query()
            ->with(['statements'])
            ->withCount(['statements'])
            ->get();
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
    public function saveQuiz(QuizRequest $request)
    {
        $this->scoreCalculation($request);

        return redirect('/hasil');
    }

    public function result()
    {
        $labelChart = Aspect::get()->pluck('aspect');
        $scores = auth()->user()->scores->pluck('score');

        $icons = collect([
            'low' => 'far fa-frown-open fa-2x text-danger',
            'good' => 'far fa-grin-alt fa-2x text-primary',
            'great' => 'far fa-grin-hearts fa-2x text-primary'

        ]);

        $labels = Aspect::with(['tips', 'links'])->get();
        return view('kuisioners.result', compact(['scores', 'icons', 'labels', 'labelChart']));
    }

    public function scoreCalculation(QuizRequest $request)
    {
        $aspectScores = collect($request->except(['_token']));
        $aspectScores = $aspectScores->map(function ($scores) {
            $scores = collect($scores);
            $totalScore = $scores->reduce(function ($total, $score) {
                return $total + (int)$score;
            });

            $aspectTotalScore = 5 * $scores->count();
            $finalScore = ($totalScore / $aspectTotalScore) * 100;

            return $finalScore;
        });

        $aspects = Aspect::get(['id', 'aspect']);
        DB::beginTransaction();

        $scoreStored = [];

        try {
            $aspects->each(function (Aspect $aspect) use ($aspectScores, &$scoreStored) {
                $scoreStored[] = Score::query()
                    ->updateOrCreate(
                        [
                            'user_id' => auth()->id(),
                            'aspect_id' => $aspect->id,
                        ], 
                        [ 'score' => $aspectScores[Str::snake($aspect->aspect)] ]
                    );
            });

            DB::commit();    
        } catch (\Throwable $th) {
            DB::rollBack();
            
            throw $th;
        }
    }
}
