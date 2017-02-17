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
use ShawnSandy\Deploykit\ServerDeploys;

class DeployKitController extends Controller
{

    private $deploy;

    public function __construct()
    {
        $this->deploy = App::make('\ShawnSandy\Deploykit\Libs\Deploys');
    }

    public function index() {

        $servers = $this->deploy->connections();
        $deployed = ServerDeploys::orderBy('id', 'desc')->take(500)->paginate(20);
        return view('deploys::index', compact('servers','deployed'));

    }

}
