<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $modelClass;

    protected $with = [];

    /**
     * @return Model
     */
    public function model()
    {
        return resolve($this->modelClass);
    }


    public function query()
    {
        return $this->model()->newQuery()->with($this->with);
    }

    public function with($with)
    {
        $this->with = is_array($with) ? $with : func_get_args();

        return $this;
    }

    public function create($attributes = [])
    {
        return $this->model()->create($attributes);
    }

    public function update(Model $model, $attributes = [])
    {
        $model->fill($attributes);

        return $model->save();
    }

    public function find($id)
    {
        return $this->query()->find($id);
    }

    public function all($columns = ['*'])
    {
        return $this->query()->all($columns);
    }

    public function paginate($perPage)
    {
        return $this->query()->paginate($perPage);
    }

    public function delete($model)
    {
        if (!$model instanceof Model) {
            $id = data_get($model, 'id', $model);

            $model = $this->find($id);
        }

        if (!$model) {
            return true;
        }

        return $model->delete();
    }
}
