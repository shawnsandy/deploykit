<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 2/13/17
 * Time: 4:04 PM
 */

namespace ShawnSandy\Deploykit\Controllers;


use App;
use App\Http\Controllers\Controller;
use ShawnSandy\Deploykit\Libs\Deploys;
use ShawnSandy\Deploykit\ServerDeploys;

class DeployKitController extends Controller
{

    private $deploy;

    public function __construct(Deploys $deploys)
    {
        $this->deploy = $deploys;
    }

    public function index() {

        $servers = $this->deploy->connections();

        $deployed = ServerDeploys::orderBy('id', 'desc')
            ->take(config('deploykit.limit_responses', 200))
            ->paginate(config('deploykit.responses_per_page', 50));

        return view('deploys::index', compact('servers','deployed'));

    }

}
