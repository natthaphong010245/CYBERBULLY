<?php

namespace App\Http\Controllers;

use App\Models\VictimAssessment;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    /**
     * Show the form for the assessment.
     */
    public function showForm()
    {
        return view('assessment.cyberbulling.victim.form.form');
    }

    /**
     * Process the form submission and store the assessment.
     */
    public function submitForm(Request $request)
    {
        // Validate the request
        $request->validate([
            'question1' => 'required|integer|min:0|max:4',
            'question2' => 'required|integer|min:0|max:4',
            'question3' => 'required|integer|min:0|max:4',
            'question4' => 'required|integer|min:0|max:4',
            'question5' => 'required|integer|min:0|max:4',
            'question6' => 'required|integer|min:0|max:4',
            'question7' => 'required|integer|min:0|max:4',
            'question8' => 'required|integer|min:0|max:4',
            'question9' => 'required|integer|min:0|max:4',
        ]);

        // Collect all question answers into an array
        $questionsArray = [
            (int)$request->question1,
            (int)$request->question2,
            (int)$request->question3,
            (int)$request->question4,
            (int)$request->question5,
            (int)$request->question6,
            (int)$request->question7,
            (int)$request->question8,
            (int)$request->question9,
        ];

        // Create new assessment record - EXPLICITLY USE VICTIMASSESSMENT
        $assessment = VictimAssessment::create([
            'questions' => $questionsArray
        ]);

        // Calculate total score
        $totalScore = array_sum($questionsArray);
        $maxPossibleScore = 9 * 4; // 9 questions with max value of 4 each
        $percentageScore = ($totalScore / $maxPossibleScore) * 100;

        // Store the score in the session for the results page
        session(['score' => $totalScore, 'percentage' => $percentageScore]);

        // Redirect to the results page
        return redirect()->route('victim/result');
    }

    /**
     * Show the results page.
     */
    public function showResults()
    {
        $score = session('score', 0);
        $percentage = session('percentage', 0);
        
        return view('assessment.cyberbulling.victim.form.result', compact('score', 'percentage'));
    }
}