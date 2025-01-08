<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
    $highlighting = Article::where('is_highlighted',1)->with('category')->get(); 
        
        //$categories=Category::get();
        $feauturing = Article::where('featured_news',1)->get(); 
        $feauturingData = [];
        $highlightingData = [];

        $j = 0; // Counter for children within a parent
        $l = 0; // Counter for parent groups
        
        foreach ($highlighting as $key => $value) {
            // If it's the first child in a parent group
            if ($j == 0) {
                // Create a new parent group and add the current article
                $highlightingData[$l] = ['parent' => $value, 'children' => []];
            } else {
                // Add the current article as a child of the current parent
                $highlightingData[$l]['children'][] = $value;
            }
        
            $j++;
        
            // If child count reaches 3, reset the counter and move to the next parent group
            if ($j == 5) {
                $j = 0;
                $l++;
            }
        }
        
       

        return view('frontend.homepage',compact('highlighting','highlightingData','feauturing'));

    }
  
    
}
