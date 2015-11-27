<?php
/*
This file is part of SeAT

Copyright (C) 2015  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace Seat\Web\Http\Controllers\Corporation;

use App\Http\Controllers\Controller;
use Seat\Services\Repositories\Corporation\CorporationRepository;

/**
 * Class ViewController
 * @package Seat\Web\Http\Controllers\Corporation
 */
class SecurityController extends Controller
{

    use CorporationRepository;

    /**
     * @param $corporation_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRoles($corporation_id)
    {

        $security = $this->getCorporationMemberSecurity($corporation_id);

        return view('web::corporation.security.roles', compact('security'));
    }

    /**
     * @param $corporation_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTitles($corporation_id)
    {

        $titles = $this->getCorporationMemberSecurityTitles($corporation_id);

        return view('web::corporation.security.titles', compact('titles'));
    }

    /**
     * @param $corporation_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLog($corporation_id)
    {

        $logs = $this->getCorporationMemberSecurityLogs($corporation_id);

        return view('web::corporation.security.log', compact('logs'));
    }

}