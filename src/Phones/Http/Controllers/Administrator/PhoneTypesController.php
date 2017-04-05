<?php

namespace Myrtle\Core\Phones\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Myrtle\Phones\Http\Requests\SavePhoneTypeRequest;
use Myrtle\Phones\Models\PhoneType;

class PhoneTypesController extends Controller
{
    public function index()
    {
        $phonetypes = PhoneType::orderBy('name')->paginate();

        return view('admin::phones.types.index')->withPhonetypes($phonetypes);
    }

    public function create(PhoneType $phonetype)
    {
        $this->authorize('create', PhoneType::class);

        return view('admin::phones.types.create')->withPhonetype($phonetype);
    }

    public function store(SavePhoneTypeRequest $request, PhoneType $phonetype)
    {
        $this->authorize('create', PhoneType::class);

        $phonetype->fill($request->toArray());

        $phonetype->save();

        flasher()->alert('Phone type added successfully', 'success');

        return redirect(route('admin.phones.types.index'));
    }

    public function edit($id)
    {
        $this->authorize('edit', PhoneType::class);

        $phonetype = PhoneType::findOrFail($id);

        return view('admin::phones.types.edit')->withPhonetype($phonetype);
    }

    public function update(SavePhoneTypeRequest $request, $id)
    {
        $this->authorize('edit', PhoneType::class);

        $phonetype = PhoneType::findOrFail($id);

        $phonetype->update($request->toArray());

        flasher()->alert('Phone type updated successfully', 'success');

        return redirect(route('admin.phones.types.index'));
    }

    public function destroy(Request $request, $id)
    {
        $this->authorize('delete', PhoneType::class);

        $phonetype = PhoneType::findOrFail($id);

        $phonetype->delete();

        flasher()->alert('Phone Type removed successfully', 'success');

        return redirect(route('admin.phones.types.index'));
    }

}
