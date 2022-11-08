<?php

namespace App\Console\Commands;

use App\Enums\OutgoingState;
use App\Models\Outgoing;
use Illuminate\Console\Command;

class CheckOngoingDeliveries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delivery:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '배송상태조호';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $outgoings = Outgoing::where("state", OutgoingState::ONGOING)->cursor();

        foreach($outgoings as $outgoing){
            $outgoing->checkDeliveryState();
        }
    }
}
