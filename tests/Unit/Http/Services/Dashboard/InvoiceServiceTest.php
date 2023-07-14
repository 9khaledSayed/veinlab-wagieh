<?php

namespace Http\Services\Dashboard;

use App\Http\Services\Dashboard\InvoiceService;
use Tests\TestCase;

class InvoiceServiceTest extends TestCase
{

    public function testGetMainAnalizeWithHospital()
    {
        (new InvoiceService())->getMainAnalyzeWithHospital(1);
    }

    public function testGetCollection()
    {

       dd( (new InvoiceService())->getCollection([1,2]));

    }


}
