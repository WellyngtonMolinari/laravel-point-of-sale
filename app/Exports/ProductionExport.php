<?php

namespace App\Exports;

use App\Models\Production;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Production::select('production_name','category_id','customer_id','production_store','deadline_date','cost_price','selling_price','profit_price','profit_quantity','production_status')->get();
    }
}
