<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SalesPage;

class SalesPageController extends Controller
{
    public function index()
    {
        return view('generate');
    }

    public function history()
    {
        $pages = \App\Models\SalesPage::latest()->get();
        return view('history', compact('pages'));
    }

    public function generate(Request $request)
    {
        $data = $request->all();

        $prompt = "
        Create a high-converting sales page for the following product:

        Product Name: {$data['product_name']}
        Description: {$data['description']}
        Features: {$data['features']}
        Target Audience: {$data['target_audience']}
        Price: {$data['price']}

        Include:
        - Headline
        - Subheadline
        - Product description
        - Benefits
        - Features breakdown
        - Call to action
        ";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
        ]);

        $result = $response['choices'][0]['message']['content'] ?? 'Error generating content';

        SalesPage::create([
            'user_id' => Auth::id(),
            'product_name' => $data['product_name'],
            'description' => $data['description'],
            'features' => $data['features'],
            'target_audience' => $data['target_audience'],
            'price' => $data['price'],
            'result' => $result,
        ]);

        return view('result', compact('result'));
    }

    public function delete($id)
    {
        SalesPage::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect('/history');
    }

    public function show($id)
    {
        $page = SalesPage::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $result = $page->result;

        return view('result', compact('result'));
    }
}