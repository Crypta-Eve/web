<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015 to 2020 Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Seat\Web\Http\Controllers\Corporation;

use Seat\Eveapi\Models\Corporation\CorporationInfo;
use Seat\Services\Repositories\Corporation\Extractions;
use Seat\Web\Http\Controllers\Controller;

/**
 * Class ExtractionController.
 * @package Seat\Web\Http\Controllers\Corporation
 */
class ExtractionController extends Controller
{
    use Extractions;

    /**
     * @param \Seat\Eveapi\Models\Corporation\CorporationInfo $corporation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getExtractions(CorporationInfo $corporation)
    {
        // retrieve any valid extraction for the current corporation
        $extractions = $this->getCorporationExtractions($corporation->corporation_id)->get();

        return view('web::corporation.extraction.extraction', compact('extractions', 'corporation'));
    }
}
