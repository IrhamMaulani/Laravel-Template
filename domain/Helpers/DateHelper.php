<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{

    /**
     * @var array|string[]
     * output day based on array
     * @example $indonesianDay[0] = 'Minggu'
     */
    protected array $indonesianDay = [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];

    /**
     * @var array|string[]
     * output month based on array
     * @example $indonesianMonth[1] = 'Januari'
     */
    protected array $indonesianMonth = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    /**
     * @param string $date
     * To convert string date to human-readable
     * @input example 31-10-1997
     * @output example Selasa, 31 Oktober 1997
     */
    public function convertToHumanDate(string $date): string
    {
        $date = array_map('intval', explode('-', Carbon::parse($date)->format('w-d-n-Y')));
        return $this->indonesianDay[$date[0]] . ', ' . $date[1] . ' ' . $this->indonesianMonth[$date[2]] . ' ' . $date[3];
    }

    public function convertToHumanDateWithTime(string $date): string
    {
        $date =  Carbon::parse($date);
        $convertDate = $date->format('w-d-n-Y');
        $convertTime = $date->format('H:i');
        $convertDate = array_map('intval', explode('-', $convertDate));
        return $this->indonesianDay[$convertDate[0]] . ', ' . $convertDate[1] . ' ' . $this->indonesianMonth[$convertDate[2]] . ' ' . $convertDate[3] . ' ' . $convertTime;
    }

    /* To convert string date to human-readable without day name
    * @input example 31-10-1997
    * @output example 31 Oktober 1997
    */
    public function convertToHumanDateWithoutDayName(string $date): string
    {
        $date = Carbon::parse($date);
        return $date->format('d') . ' ' . $date->format('F') . ' ' . $date->format('Y');
    }

    public function convertToDayAndYear(string $date): string
    {
        $date = Carbon::parse($date);
        return $date->format('F') . ', ' . $date->format('d');
    }

    public function convertToYearNow(string $date): string
    {
        $date = Carbon::parse($date);
        return date('Y') . '-' . $date->format('m') . '-' . $date->format('d');
    }
    /**
     * @param string $date
     * @return string
     * @output Januari 2020
     */
    public function convertToIndonesiaMonthAndYear(string $date): string
    {
        return $this->indonesianMonth[(int)Carbon::parse($date)->format('n')] . " " . Carbon::parse($date)->format('Y');
    }

    /**
     * @param string $time
     * @return string
     * @output 00:00
     */
    public function convertToMinute(string $time): string
    {
        return Carbon::parse($time)->format('H:i');
    }

    /**
     * @param string $date
     * To convert string date to human-readable
     * @input example 31-10-1997
     * @output example Selasa/ 31 Oktober 1997
     */
    public function timeDifference(string $date): string
    {
        $createdDateCarbon = Carbon::parse($date);
        $currentDateCarbon = Carbon::now();
        return $createdDateCarbon->diffForHumans($currentDateCarbon);
    }
}
