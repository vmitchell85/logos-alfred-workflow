<?php

namespace Logos;

use Alfred\Workflows\Workflow;
use Illuminate\Database\Capsule\Manager as Capsule;

class Catalog
{
    protected $connection;

    public function __construct()
    {
        $capsule = new Capsule;

        $basePath = $_SERVER['HOME'] . '/Library/Application Support/Logos4/Data/';

        $directories = glob($basePath . '/*', GLOB_ONLYDIR);

        if (count($directories) == 1) {
            $dbPath = $directories[0] . '/LibraryCatalog/catalog.db';
        } else {
            $dbPath = '';
            foreach($directories as $dir) {
                $testPath = $dir . '/LibraryCatalog/catalog.db';
                if (file_exists($testPath)) {
                    $dbPath = $testPath;
                }
            }
        }

        $capsule->addConnection([
            'driver' => 'sqlite',
            'host' => 'localhost',
            'database' => $dbPath,
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function search($query)
    {
        $results = Capsule::table('Records')
            ->select('title', 'resourceid', 'authors')
            ->where('ResourceDriverName', 'logos')
            ->where('Availability', '>=', 1)
            ->where(function ($q) use ($query) {
                $q->where('Title', 'like', '%' . $query . '%')
                ->orWhere('UserTitle', 'like', '%' . $query . '%')
                ->orWhere('UserAbbreviatedTitle', 'like', '%' . $query . '%')
                ->orWhere('AbbreviatedTitle', 'like', '%' . $query . '%')
                ->orWhere('ResourceId', 'like', '%' . $query . '%');
            })
            ->get();
        $workflow = new Workflow;

        foreach (collect($results) as $result) {
            $workflow->result()
                ->uid($result->Title)
                ->title($result->Title)
                ->autocomplete($result->Title)
                ->subtitle($result->Authors)
                ->arg($result->ResourceId)
                ->valid(true);
        }

        echo $workflow->output();
    }
}
