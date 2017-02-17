<?php
    /**
     * Created by PhpStorm.
     * User: shawnsandy
     * Date: 2/13/17
     * Time: 4:14 PM
     */

    namespace ShawnSandy\Deploykit\Libs;

    use Carbon\Carbon;
    use Config;
    use Log;
    use Exception;
    use Collective\Remote\RemoteFacade as SSH;
    use Session;
    use ShawnSandy\Deploykit\ServerDeploys;

    class Deploys
    {

        public $connections;

        protected $commands = [
            "default" => ['cd /var/www',  'git pull'],
            "migrate" => ['cd /var/www', 'git pull', 'php artisan migrate'],
            "update" => ['cd /var/www', 'git pull', 'composer update', 'php artisan migrate'],
        ];

        public function __construct()
        {

        }

        public function deploy($connection)
        {
            return $this->ssh($connection, [
                'cd /var/www',
                'git pull'
            ]);
        }

        public function deployWithMigration($connection)
        {

            return $this->ssh($connection, [
                'cd /var/www',
                'git pull',
                'php artisan migrate'
            ]);
        }

        public function connections()
        {
            return $connections = Config::get('remote.connections');
        }

        /**
         * @param string $connection connection name
         * @param string $commands commands to run
         * @return bool
         */
        public function ssh($connection, $commands)
        {

            $command = $this->commands[$commands];
            try {
                SSH::into($connection)->run($command, function($line) use ($connection) {
                    $message = "$connection server deployed - ".$line ;

                    ServerDeploys::create([
                        'connection' => $connection,
                        'responses' => $line.PHP_EOL
                    ]);

                });
            } catch (Exception $exception) {
                ServerDeploys::create([
                    'connection' => $connection,
                    'responses' => $exception->getMessage()
                ]);
                Log::error($exception->getMessage());
            }


        }

        public function getFile()
        {
            try {
                SSH::into('production')->get('/var/www/.env', public_path('/env/example.env-' .  Carbon::now()), function ($line) {
                    Log::info($line);
                    return $line;
                });

                return "success";

            } catch (Exception $exception) {
                return $exception->getMessage();
            }
        }

        public function getCommands() {
            return $this->commands ;
        }

    }
