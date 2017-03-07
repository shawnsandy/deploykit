<?php
    /**
     * Created by PhpStorm.
     * User: shawnsandy
     * Date: 2/13/17
     * Time: 4:14 PM
     */

    namespace ShawnSandy\Deploykit\Libs;

    use Config;
    use Log;
    use Exception;
    use Collective\Remote\RemoteFacade as SSH;
    use ShawnSandy\Deploykit\ServerDeploys;

class Deploys
{

    public $connections;

    protected $commands = [
    "default" => ['cd /var/www', 'git pull'],
    "migrate" => ['cd /var/www', 'git pull', 'php artisan migrate'],
    "update" => ['cd /var/www', 'git pull', 'composer update', 'php artisan migrate'],
    ];

    public function __construct()
    {

        if (Config::get("deploykit.commands") && is_array(Config::get("deploykit.commands"))) {
            $this->commands = config('deploykit.commands');
        }

    }

    public function connections()
    {
        return $connections = Config::get('remote.connections');
    }

    /**
         * @param string $connection connection name for server
         * @param string $commands   commands to run
         * @return bool
         */
    public function ssh($connection, $commands)
    {

        $command = $this->commands[$commands];
        try {
            SSH::into($connection)->run(
                $command, function ($line) use ($connection) {
                    $message = "$connection server deployed - " . $line;

                    ServerDeploys::create(
                        [
                        'connection' => $connection,
                        'responses' => $line . PHP_EOL
                        ]
                    );

                }
            );
        } catch (Exception $exception) {
            ServerDeploys::create(
                [
                'connection' => $connection,
                'responses' => $exception->getMessage()
                ]
            );
            Log::error($exception->getMessage());
        }


    }

    public function getCommands()
    {
        return $this->commands;
    }

}
