<?php

namespace App\Http\Services\Dashboard;

use App\Models\Branch;

class BranchService
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData(model: new Branch());
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        Branch::create($data);
    }

    /**
     * @param $data
     * @param $branch
     */
    public function update($data, $branch)
    {
        if (is_numeric($branch)) {
            $branch = Branch::findOrFail($branch);
            $branch->update($data);
        } else {
            $branch->update($data);
        }
    }

    /**
     * @param $branch
     */
    public function delete($branch)
    {
        if (is_numeric($branch)) {
            $branch = Branch::findOrFail($branch);
            $branch->delete();
        } else {
            $branch->delete();
        }
    }
}
