<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TranslationService;

class TranslationCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translation:cron';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '컨텐츠 번역 작업을 실행합니다.';


    public function __construct()
    {
        parent::__construct();
        $this->translationService = new TranslationService();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $result = $this->translationService->run();
            if ($result === 'success') {
                \Log::info('translationService is finished.');
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
