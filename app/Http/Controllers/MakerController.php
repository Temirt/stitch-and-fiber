<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakerController extends Controller
{
    /**
     * Display the Maker's Portal.
     */
    public function index()
    {
        $patterns = session()->get('maker_patterns', $this->getDefaultPatterns());
        session()->put('maker_patterns', $patterns);
        
        return view('maker', compact('patterns'));
    }

    /**
     * Increment the row count of a pattern.
     */
    public function increment(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
        ]);

        $patterns = session()->get('maker_patterns', $this->getDefaultPatterns());
        $id = $request->id;

        if (isset($patterns[$id])) {
            if ($patterns[$id]['current_row'] < $patterns[$id]['total_rows']) {
                $patterns[$id]['current_row']++;
            }
            session()->put('maker_patterns', $patterns);
        }

        if ($request->wantsJson()) {
            return response()->json($patterns[$id]);
        }

        return redirect()->back();
    }

    /**
     * Decrement the row count of a pattern.
     */
    public function decrement(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
        ]);

        $patterns = session()->get('maker_patterns', $this->getDefaultPatterns());
        $id = $request->id;

        if (isset($patterns[$id])) {
            if ($patterns[$id]['current_row'] > 0) {
                $patterns[$id]['current_row']--;
            }
            session()->put('maker_patterns', $patterns);
        }

        if ($request->wantsJson()) {
            return response()->json($patterns[$id]);
        }

        return redirect()->back();
    }

    /**
     * Reset row count.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
        ]);

        $patterns = session()->get('maker_patterns', $this->getDefaultPatterns());
        $id = $request->id;

        if (isset($patterns[$id])) {
            $patterns[$id]['current_row'] = 0;
            session()->put('maker_patterns', $patterns);
        }

        if ($request->wantsJson()) {
            return response()->json($patterns[$id]);
        }

        return redirect()->back();
    }

    /**
     * Get default maker patterns data.
     */
    private function getDefaultPatterns()
    {
        return [
            'highland-throw' => [
                'id' => 'highland-throw',
                'name' => 'The Highland Throw',
                'stitch_type' => 'Moss Stitch (Chunky knit)',
                'hook_size' => '10.0 mm (US N/P)',
                'yarn_type' => 'Chunky Merino Wool',
                'current_row' => 45,
                'total_rows' => 120,
                'image' => 'images/product-1.png'
            ],
            'sienna-crop-top' => [
                'id' => 'sienna-crop-top',
                'name' => 'Sienna Crop Top',
                'stitch_type' => 'Half Double Crochet (Hdc)',
                'hook_size' => '5.0 mm (US H-8)',
                'yarn_type' => 'Organic Pima Cotton',
                'current_row' => 18,
                'total_rows' => 60,
                'image' => 'images/product-3.png'
            ]
        ];
    }
}
