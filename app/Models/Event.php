<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'start',
        'end',
        'days',
    ];

    /** 
     * Get events from database
     * return @var array[]
     */
    public static function getEvents()
    {
        $today      = today(); 
        $dates      = []; 
        $weekDays   = ['No Event'];
        $daterange  = [];

        $event = self::first();

        /** 
         * Check if there is existing event
         * Generate daterange between start and end of event
         */
        if ($event) {

            if (!is_null(json_decode($event->days))) {
                $weekDays = json_decode($event->days);
            }
            
            $daterange = CarbonPeriod::create($event->start, $event->end)->toArray();
        }

        /** 
         * Loop through days of the current month
         * Check if day exist in event date range and does fall in selected day of the week
         * Return days of the whole month
         */
        for($i=1; $i < $today->daysInMonth + 1; ++$i) {

            $date = Carbon::create($today->year, $today->month, $i);
            $shortName = $date->format('l');

            $emptyEvent = [
                'title' => '',
                'day' => $shortName,
                'count' => $i,
                'is_event' => false
            ];

            if (!$event) {
                $dates[] = $emptyEvent;
            } else {
                if (in_array($date, $daterange) && in_array($shortName, $weekDays)) {
                    $dates[] = [
                        'title' => $event->title,
                        'day' => $shortName,
                        'count' => $i,
                        'is_event' => true
                    ];
                } else {
                    $dates[] = $emptyEvent; 
                }
            }
        }

        return $dates;
    }

    /** 
     * Get events from database
     * return @var response
     */
    public static function saveEvents($request)
    {
        DB::beginTransaction();

        try {

            /** Clear out table to save new event */
            self::truncate();

            $startDate = $request->start;
            $endDate = $request->end;

            /** Save event in table */
            $event = [
                'title' => $request->title,
                'start' => $startDate,
                'end'   => $endDate,
                'days'  => json_encode($request->days)
            ];

            self::insert($event);

            DB::commit();

            return true;

        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            return false;
        }
    }
}
