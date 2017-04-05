<?php

namespace Myrtle\Core\Phones\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Myrtle\Phones\Models\PhoneType;

class PhoneTypesSeedController extends Controller
{
    public function create()
    {
        $this->authorize('seed', PhoneType::class);

        $types = \PhoneTypesTableSeeder::types();

        return view('admin::docks.phones.types.seed.create')->withTypes($types);
    }

    public function store(Request $form)
    {
        $this->authorize('seed', PhoneType::class);

        Artisan::call('db:seed', ['--class' => \PhoneTypesTableSeeder::class]);

        flasher()->alert('Phone Types seeded successfully', 'success');

        return redirect(route('admin.phones.types.index'));
    }
}
