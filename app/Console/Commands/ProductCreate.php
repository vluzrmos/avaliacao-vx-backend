<?php

namespace App\Console\Commands;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Console\Command;

class ProductCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product.';


    protected $repository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        $fields = [
            'price',
            'delivery_days',
            'reference',
        ];

        $attributes = [
            'name' => $name
        ];

        $required = ['price', 'delivery_days', 'reference'];

        foreach($fields as $field) {
            $answer = $this->ask($field);

            if ($answer !== null) {
                $attributes[$field] = $answer;
            }

            if ($answer === null && in_array($field, $required, true)) {
                $this->error($field.' is required.');
                return;
            }
        }

        $product = $this->repository->create($attributes);

        $this->info("Product {$product->name} created.");
    }
}
