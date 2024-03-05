<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamInterface;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamRepository extends BaseRepository implements TeamInterface
{
    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    public function customPaginate(Request $request, int $pagination = 10): mixed
    {
        return $this->model->query()->paginate($pagination);
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->update($data, $id);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->delete($id);
    }
}
