<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip tracking for admin routes
        if (strpos($request->path(), 'admin') === 0) {
            return $next($request);
        }

        // Get location data without storing IP
        $country = $this->getCountryFromIP($request->ip());
        $city = $this->getCityFromIP($request->ip());
        $pageVisited = $request->fullUrl();
        
        // Create a simple visitor record without IP
        \App\Models\Visitor::create([
            'ip_address' => 'anonymous', // Don't store real IP
            'user_agent' => $request->userAgent(),
            'page_visited' => $pageVisited,
            'referrer' => $request->header('referer'),
            'country' => $country,
            'city' => $city,
            'is_unique' => true,
            'last_visit' => now(),
            'visit_count' => 1
        ]);

        return $next($request);
    }
    
    /**
     * Get country from IP address (simplified version)
     */
    private function getCountryFromIP($ip)
    {
        // For demo purposes, return some sample countries
        // In production, you'd use a service like ipapi.co or ipinfo.io
        $sampleCountries = ['United States', 'Canada', 'United Kingdom', 'Germany', 'France', 'Australia', 'Japan', 'Brazil'];
        return $sampleCountries[array_rand($sampleCountries)];
    }
    
    /**
     * Get city from IP address (simplified version)
     */
    private function getCityFromIP($ip)
    {
        // For demo purposes, return some sample cities
        $sampleCities = ['New York', 'London', 'Paris', 'Tokyo', 'Sydney', 'Toronto', 'Berlin', 'Madrid'];
        return $sampleCities[array_rand($sampleCities)];
    }
}
