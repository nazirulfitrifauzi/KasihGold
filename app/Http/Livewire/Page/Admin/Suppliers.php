<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\InvSupplier;
use App\Models\States;
use Livewire\Component;

class Suppliers extends Component
{
    public $states, $add, $edit, $delete;

    public function mount()
    {
        $this->states = States::all();
    }
    
    public function addSupplier()
    {
        $supplier = InvSupplier::create([
            'code' => $this->add['code'],
            'name' => $this->add['name'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
            'address1' => $this->add['address1'],
            'address2' => $this->add['address2'],
            'address3' => $this->add['address3'],
            'postcode' => $this->add['postcode'],
            'town' => $this->add['town'],
            'state_id' => $this->add['state'],
            'phone1' => $this->add['phone1'],
            'phone2' => $this->add['phone2'],
            'fax' => $this->add['fax'],
        ]);

        session()->flash('type', 'success');
        session()->flash('title', 'Info');
        session()->flash('message', 'Supplier successfully added.');

        return redirect()->to('/admin/suppliers');
    }

    public function edit($id)
    {
        $supplier = InvSupplier::where('id', $id)->first();
        
        $this->edit['id'] = $supplier->id;
        $this->edit['code'] = $supplier->code;
        $this->edit['name'] = $supplier->name;
        $this->edit['address1'] = $supplier->address1;
        $this->edit['address2'] = $supplier->address2;
        $this->edit['address3'] = $supplier->address3;
        $this->edit['postcode'] = $supplier->postcode;
        $this->edit['town'] = $supplier->town;
        $this->edit['state'] = $supplier->state_id;
        $this->edit['phone1'] = $supplier->phone1;
        $this->edit['phone2'] = $supplier->phone2;
        $this->edit['fax'] = $supplier->fax;
    }

    public function saveEdit()
    {
        $supplier = InvSupplier::where('id', $this->edit['id'])->first();

        $supplier->code = $this->edit['code'];
        $supplier->name = $this->edit['name'];
        $supplier->address1 = $this->edit['address1'];
        $supplier->address2 = $this->edit['address2'];
        $supplier->address3 = $this->edit['address3'];
        $supplier->postcode = $this->edit['postcode'];
        $supplier->state_id = $this->edit['state'];
        $supplier->phone1 = $this->edit['phone1'];
        $supplier->phone2 = $this->edit['phone2'];
        $supplier->fax = $this->edit['fax'];

        $supplier->save();

        session()->flash('type', 'success');
        session()->flash('title', 'Info');
        session()->flash('message', 'Supplier has been edited.');

        return redirect()->to('/admin/suppliers');
    }

    public function delete($id)
    {
        $supplier = InvSupplier::where('id', $id)->first();
        $this->delete['id'] = $supplier->id;
    }

    public function saveDelete()
    {
        InvSupplier::destroy($this->delete['id']);

        session()->flash('type', 'info');
        session()->flash('title', 'Info');
        session()->flash('message', 'Supplier has been deleted.');

        return redirect()->to('/admin/suppliers');
    }

    public function render()
    {
        return view('livewire.page.admin.suppliers', [
            'suppliers' => InvSupplier::all(),
        ]);
    }
}
