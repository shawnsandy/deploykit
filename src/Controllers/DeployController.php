<?php
    /**
     * Created by PhpStorm.
     * User: shawnsandy
     * Date: 2/14/17
     * Time: 3:33 PM
     */
    namespace ShawnSandy\Deploykit\Controllers;
    use App;
    use Log;
    use Exception;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class DeployController extends Controller
    {

        /**
         * @param $connection
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function __invoke($connection, Request $request)
        {
            $deploy = App::make('\ShawnSandy\Deploykit\Libs\Deploys');
            $commands = "default";
            try {
                if ($request->has('commands')):
                    $commands = $request->commands;
                endif;
                $deploy->ssh($connection, $commands);
            } catch (Exception $exception) {
                Log::error('Error deploying ' . $exception->getMessage());
                $message = 'Error deploying to ' . $connection;
                return back()->with('error', $message);
            }
            $message = 'Your ' . $connection . ' server has been updated';
            return back()->with('success', $message);
        }

    }