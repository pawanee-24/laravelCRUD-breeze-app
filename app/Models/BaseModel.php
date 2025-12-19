<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Convert common timestamp fields to Carbon automatically
     */
    protected function castToCarbon($value)
    {
        if (!$value) {
            return null;
        }

        return is_numeric($value)
            ? Carbon::createFromTimestamp($value)
            : Carbon::parse($value);
    }

    // Common formatted date
    public function formatDate($field, $format = 'Y-m-d H:i')
    {
        $date = $this->castToCarbon($this->getAttribute($field));
        return $date ? $date->format($format) : 'N/A';
    }

    // Human readable date
    public function humanDate($field)
    {
        $date = $this->castToCarbon($this->getAttribute($field));
        return $date ? $date->diffForHumans() : 'N/A';
    }

}
