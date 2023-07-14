<?php

namespace App\Http\Services\Dashboard;

use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyCategory;

class InsuranceCompanyService
{

    /**
     * @return array
     */
    public function index()
    {
        return getModelData(model: new InsuranceCompany());
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        $categories = $data['insurance_company_categories'];
        unset($data['insurance_company_categories']);
        $insuranceCompany = InsuranceCompany::create($data);
        foreach ($categories as $index => $category) {
            InsuranceCompanyCategory::create([
                'name'                 => $category['name'],
                'percentage'           => $category['percentage'],
                'insurance_company_id' => $insuranceCompany->id
            ]);
        }
    }

    /**
     * @param $insuranceCompany
     * @param $data
     */
    public function update($insuranceCompany, $data)
    {
        // Check if $insuranceCompany is number or object
        if (is_numeric($insuranceCompany)) {
            $insuranceCompany = InsuranceCompany::findOrFail($insuranceCompany);
        }
        $categories = $data['insurance_company_categories'];
        unset($data['insurance_company_categories']);
        $insuranceCompany->category()->delete();
        $insuranceCompany->update($data);
        foreach ($categories as $index => $category) {
            InsuranceCompanyCategory::create([
                'name'                 => $category['name'],
                'percentage'           => $category['percentage'],
                'insurance_company_id' => $insuranceCompany->id
            ]);
        }
    }

    /**
     * @param $insuranceCompany
     */
    public function destroy($insuranceCompany)
    {
        if (is_numeric($insuranceCompany)) {
            $insuranceCompany = InsuranceCompany::findOrFail($insuranceCompany);
            $insuranceCompany->delete();
        } else {
            $insuranceCompany->delete();
        }
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \OpenSpout\Common\Exception\IOException
     * @throws \OpenSpout\Common\Exception\InvalidArgumentException
     * @throws \OpenSpout\Common\Exception\UnsupportedTypeException
     * @throws \OpenSpout\Writer\Exception\WriterNotOpenedException
     */
    public function exportExcel()
    {
        $insuranceCompanies = InsuranceCompany::get()->map(function ($insuranceCompany) {
            return [
                '#'              => $insuranceCompany->id,
                __('Name')       => $insuranceCompany->name,
                __('Dues')       => $insuranceCompany->our_money,
                __('Created at') => $insuranceCompany->created_at,
            ];
        });
        return (new \Rap2hpoutre\FastExcel\FastExcel($insuranceCompanies))->download(__('Insurance companies') . '.xlsx');
    }
}
