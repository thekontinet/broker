<?php

namespace App\Http\Controllers;

use App\Enums\KycType;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RequestVerificationController extends Controller
{
    public function create(Request $request)
    {
        if($kyc = Kyc::query()->where('user_id', auth()->id())->first()){
            return view($kyc->approved ? 'verification.success' : 'verification.pending');
        }
        return view('verification.request',[
            'options' => KycType::cases()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => ['required', Rule::in(array_column(KycType::cases(), 'value'))],
            'document' => ['required', 'image']
        ],[
            'document.required' =>  'Please upload a document'
        ]);

        $documentImage = $request->file('document')->store('documents', 'public');

        Kyc::create([
            'user_id' => auth()->id(),
            'type' => $request->input('type'),
            'meta' => [$documentImage]
        ]);

        return redirect()->back();
    }
}
