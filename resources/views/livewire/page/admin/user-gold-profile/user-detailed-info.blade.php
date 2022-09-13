<div class="grid grid-cols-12 bg-gray-100 rounded-md p-4 gap-6 mt-4">
    <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5">
        <! -- Start Maklumat Pelanggan -->
        <div class="bg-white rounded-lg">
            <div class="px-4 py-2 text-white bg-gray-600 rounded-t-lg">
                <p>Maklumat Pelanggan</p>
            </div>
            <div class="px-4 py-4">
                <x-form.basic-form wire:submit.prevent="">
                    <x-slot name="content">
                        <x-general.grid mobile="1" gap="0" sm="2" md="2" lg="2" xl="2" class="items-center col-span-12">
                            <label class="block text-sm font-semibold leading-5 text-gray-700">Customer's Email</label>
                            <div class="flex items-center space-x-2">
                                <x-form.input label=""  value="" wire:model="emel"/>
                                <button type="button"
                                    class="flex items-center p-2 text-xs bg-yellow-300 rounded-full hover:bg-yellow-400 focus:outline-none tooltipbtn" 
                                    data-title="Carian" 
                                    data-placement="top"
                                    wire:click="search"
                                    >
                                    <x-heroicon-o-search class="w-4 h-4 "/>
                                </button>
                            </div>
                            <label class="block text-sm font-semibold leading-5 text-gray-700">Name</label>
                            <x-form.input label=""  value="" disable="true" wire:model="name"/>
                            <label class="block text-sm font-semibold leading-5 text-gray-700">Phone Number</label>
                            <x-form.input label=""  value="" disable="true"  wire:model="pnum"/>
                            <label class="block text-sm font-semibold leading-5 text-gray-700">NRIC</label>
                            <x-form.input label=""  value="0%" disable="true"  wire:model="nric"/>
                            <label class="block text-sm font-semibold leading-5 text-gray-700">Total Fixed Digital Wafer (g)</label>
                            <x-form.input label=""  value="0%" disable="true"  wire:model="tdg"/>
                            <label class="block text-sm font-semibold leading-5 text-gray-700">Total Flexible Digital Wafer (g)</label>
                            <x-form.input label=""  value="0%" disable="true"  wire:model="tsg"/>
                            <label class="block text-sm font-semibold leading-5 text-gray-700">Total Digital Gold Dinar (g)</label>
                            <x-form.input label=""  value="0%" disable="true"  wire:model="tdd"/>
                            
                        </x-general.grid>
                    </x-slot>
                </x-form.basic-form>
            </div>
        </div>
        <! -- End Maklumat Pelanggan -->
  
        
  
    </div>
    <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-7 xxl:col-span-7 ">
  
        <! -- Start Urus Niaga Semasa -->
        <div class="bg-white rounded-lg">
            <div class="px-4 py-2 text-white bg-gray-600 rounded-t-lg">
                <p>Add Digital Gold to Customer</p>
            </div>
            <div class="px-4 py-4">
                <x-form.basic-form wire:submit.prevent="">
                    <x-slot name="content">
                        <x-general.grid mobile="1" gap="2" sm="2" md="2" lg="4" xl="4" class="col-span-12">
                            <x-form.dropdown label="Digital Gold Type" value="" default="yes" id="type" wire:model="digitalType">
                                @foreach ($goldType as $item)
                                <option value="{{$item->id}}" >{{$item->info->prod_name}}</option>
                                @endforeach
                                
                            </x-form.dropdown>
                            <x-form.dropdown label="Transaction Type" value="" default="yes" id="type" wire:model="transactionType" >
                                <option value="J" >Jompay</option>
                                <option value="C" >Cash</option>
                                <option value="F" >Promotion/Free</option>
                                
                            </x-form.dropdown>
  
                            
                            <div class="flex items-center space-x-2">
                                <x-form.input label="Weight (g)"  value="" wire:model='weight' disable="true" />
                                <x-form.input label="Price"  value="" wire:model='price' disable="true" />
                              <button type="submit"
                                  class="flex items-center p-1 mt-4 text-xs bg-yellow-300 rounded-full hover:bg-yellow-400 focus:outline-none tooltipbtn" 
                                  data-title="Add" 
                                  data-placement="top"
                                  wire:click="addGold"
                                  >
                                  <x-heroicon-o-plus class="w-4 h-4 "/>
                              </button>
                          </div>
                        </x-general.grid>
                    </x-slot>
                </x-form.basic-form>
             
            </div>
        </div>
        <! -- End Urus Niaga Semasa -->
  
  
    </div>
    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xxl:col-span-12 ">
  
  
    <! -- Start Maklumat Produk -->
        <div class="mt-4 bg-white rounded-lg">
            <div class="px-4 py-2 text-white bg-gray-600 rounded-t-lg">
                <p>Digital Gold Details</p>
            </div>
            <x-table.table>
                <x-slot name="thead">
                    <x-table.table-header class="w-10 text-left" value="NO." sort="" />
                    <x-table.table-header class="text-left w-52" value="Product Name" sort="" />
                    <x-table.table-header class="text-left" value="Weight" sort="" />
                    <x-table.table-header class="text-left" value="Bought Price" sort="" />
                    <x-table.table-header class="text-left" value="Active Ownership" sort="" />
                    <x-table.table-header class="text-left" value="Bought Date" sort="" />
                    <x-table.table-header class="text-left" value="Receipt" sort="" />
                </x-slot>
                <x-slot name="tbody">
                    @forelse ($gold as $item)
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{$loop->iteration}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{$item->products->prod_name}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{number_format($item->weight,2)}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{number_format($item->bought_price,2)}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{ ($item->active_ownership==1 ? 'Active' : 'Inactive')}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{$item->created_at->format('d F Y')}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{$item->referenceNumber}}
                                </x-table.table-body>
                               
                            </tr>
                    @empty
                        <tr>
                            <x-table.table-body colspan="8" class="text-center text-gray-500">
                                This customer haven't purchased any gold yet.
                            </x-table.table-body>
                        </tr>
                    @endforelse
                    
                </x-slot>
                <div class="px-2 py-2">
                    {{ $gold->links('pagination-links') }}
                </div>
            </x-table.table>
        </div>
        <! -- End Maklumat Produk -->
    </div>
  </div>

  @push('js')
    <script>
       
       window.livewire.on('message', message => {
    alert(message);
    // or whatever alerting library you'd like to use
})
    </script>
@endpush
