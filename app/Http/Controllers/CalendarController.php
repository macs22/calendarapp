<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;

class CalendarController extends Controller
{
    /** 
     * Render event
     */
    public function index()
    {
        $event = Event::first();
        $month = date('F');

        return view('calendar.index', compact('event', 'month'));
    }

    /** 
     * Ajax call to get events
     */
    public function getEvents(Request $request)
    {
        $dates = Event::getEvents();

        echo json_encode($dates);
    }

    /** 
     * Ajax call to save events
     */
    public function addEvent (Request $request)
    {
        $data = Event::saveEvents($request);

        echo json_encode($data);
    }
}
