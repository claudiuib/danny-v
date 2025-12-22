<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\ContactInfo;
use App\Models\Service;
use App\Models\AboutPageContent;
use App\Models\MainPageContent;

class PageController extends Controller
{
  public function home() { 
        $mainPageContent = MainPageContent::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->first();
        return view('pages.home', compact('mainPageContent')); 
    }
    public function about() { 
        $aboutContents = AboutPageContent::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.about', compact('aboutContents')); 
    }
    public function services() { 
        $services = Service::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.services', compact('services')); 
    }
    public function portfolio() { 
        $portfolios = Portfolio::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.portfolio', compact('portfolios')); 
    }
    public function contact() { 
        $contactInfo = ContactInfo::where('is_active', true)->first();
        return view('pages.contact', compact('contactInfo')); 
    }
}
