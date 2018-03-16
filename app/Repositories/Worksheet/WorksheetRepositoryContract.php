<?php
/**
 * Created by PhpStorm.
 * User: think
 * Date: 11/02/2018
 * Time: 10:56 PM
 */

namespace App\Repositories\Worksheet;


interface WorksheetRepositoryContract
{
    public function getWorksheetDetails($sheetCode);

    public function processAuth($request);

    public function processWaitshoes($request);

    public function processRepair($request);

    public function processSendback($request);

    public function getWorksheetPhaseCount($processPhase);
}