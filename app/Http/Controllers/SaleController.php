<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Repositories\SaleRepository;
use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class SaleController extends Controller
{
    protected $repository;

    public function __construct(SaleRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 20;

        return $this->repository->with('products:name,delivery_days')->paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $sale = $this->repository->create($request->validated());

        $this->repository->syncProducts($sale, $request->products);

        return Response()->json(['message'=>'Venda Concluida com sucesso!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->with('products:name,delivery_days')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, Sale $sale)
    {
        $this->repository->update($sale, $request->validated());
        $this->repository->syncProducts($sale, $request->products);

        return Response()->json('Venda Alterada com sucesso!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $this->repository->syncProducts($sale, []);
        $this->repository->delete($sale);

        return Response()->json('Venda Excluida com sucesso!', 200);
    }
}
