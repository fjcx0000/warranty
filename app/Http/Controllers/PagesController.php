<?php
namespace App\Http\Controllers;

use DB;
use Carbon;
use Illuminate\Http\Request;
use App\Repositories\Task\TaskRepositoryContract;
use App\Repositories\Lead\LeadRepositoryContract;
use App\Repositories\User\UserRepositoryContract;
use App\Repositories\Client\ClientRepositoryContract;
use App\Repositories\Setting\SettingRepositoryContract;
use App\Repositories\Worksheet\WorksheetRepositoryContract;

class PagesController extends Controller
{

    protected $users;
    protected $clients;
    protected $settings;
    protected $tasks;
    protected $leads;
    protected $worksheets;

    public function __construct(
        UserRepositoryContract $users,
        ClientRepositoryContract $clients,
        SettingRepositoryContract $settings,
        TaskRepositoryContract $tasks,
        LeadRepositoryContract $leads,
        WorksheetRepositoryContract $worksheets
    ) {
        $this->users = $users;
        $this->clients = $clients;
        $this->settings = $settings;
        $this->tasks = $tasks;
        $this->leads = $leads;
        $this->worksheets = $worksheets;
    }

    /**
     * Dashobard view
     * @return mixed
     */
    public function dashboard(Request $request)
    {
        if ($request->has("statPeriod")) {
            $statPeriod = $request->statPeriod;
        } else {
            $statPeriod = 30;
        }


        /**
         * satistics for workwheet processphase
         */
        $countAuth = $this->worksheets->getWorksheetPhaseCount('auth');
        $countWaitshoes = $this->worksheets->getWorksheetPhaseCount('waitshoes');
        $countRepair = $this->worksheets->getWorksheetPhaseCount('repair');
        $countSendback = $this->worksheets->getWorksheetPhaseCount('sendback');

        /**
         * statistics for worksheet service type in a period
         */
        $countServiceRepair = $this->worksheets->getWorksheetServiceCount('X', $statPeriod); //修理
        $countExchange = $this->worksheets->getWorksheetServiceCount('H', $statPeriod); //更换
        $countRefund = $this->worksheets->getWorksheetServiceCount('T', $statPeriod); //退货
        $countNigotiation = $this->worksheets->getWorksheetServiceCount('G', $statPeriod); //协商

        /**
         * statistics for worksheet daily create and complete in a period
         */
        $createdWorksheetDaily = $this->worksheets->getWorksheetDailyCreated($statPeriod);
        $completedWorksheetDaily = $this->worksheets->getWorksheetDailyCompleted($statPeriod);

        return view('pages.dashboard', compact(
            'countAuth',
            'countWaitshoes',
            'countRepair',
            'countSendback',
            'statPeriod',
            'countServiceRepair',
            'countExchange',
            'countRefund',
            'countNigotiation',
            'createdWorksheetDaily',
            'completedWorksheetDaily'
        ));
    }
}
