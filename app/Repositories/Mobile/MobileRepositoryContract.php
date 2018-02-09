<?php
/**
 * Created by PhpStorm.
 * User: think
 * Date: 30/01/2018
 * Time: 11:13 PM
 */
namespace App\Repositories\Mobile;

interface MobileRepositoryContract
{
    public function agentAuth($channelID, $password);

    public function agentChangePassword($channelID, $password);

    public function applyWorkSheet($request);

    public function uploadWorkSheet($request);

}

