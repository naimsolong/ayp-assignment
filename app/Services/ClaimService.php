<?php

namespace App\Services;

use App\Enums\{
    ClaimStatusEnum, ClaimTypeEnum
};
use App\Models\Claim;

class ClaimService
{
    public function __construct(
        protected $_model = new Claim()
    ) {
        $this->_model = Claim::query();
    }

    public function setModel(Claim $model)
    {
        $this->_model = $model;

        return $this;
    }

    public function selectModel()
    {
        $this->_model->select('id', 'type', 'description', 'date', 'amount', 'status', 'submitted_at');

        return $this;
    }

    public function filterByStatusModel(string $status = 'all')
    {
        if($status == 'draft')
            $this->_model->whereStatus(ClaimStatusEnum::DRAFT);
            
        if($status == 'approved')
            $this->_model->whereStatus(ClaimStatusEnum::APPROVED);
        
        if($status == 'rejected')
            $this->_model->whereStatus(ClaimStatusEnum::REJECTED);

        return $this;
    }

    public function filterNotNullModel(string $column)
    {
        $this->_model->whereNotNull($column);

        return $this;
    }

    public function orderByModel(string $column = 'date', string $order = 'asc')
    {
        $this->_model->orderBy($column, $order);

        return $this;
    }

    public function paginateModel(int $page = 10, array $append = [])
    {
        return $this->_model->paginate($page)->appends($append);
    }

    public function getModel()
    {
        return $this->_model->get();
    }

    public function createModel(array $data)
    {
        return $this->_model->create($data);
    }

    public function updateModel(array $data)
    {
        return $this->_model->update($data);
    }

    public function getTypeDropdown()
    {
        return ClaimTypeEnum::dropdown();
    }

    public function getStatusDropdown()
    {
        return ClaimStatusEnum::dropdown();
    }
}