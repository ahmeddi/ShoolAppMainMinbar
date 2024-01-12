<div class="w-full h-full px-2 ">
    <div class= "flex justify-between h-10 mb-3">
        <button wire:click="$dispatch('open-new')" class='focus:outline-none px-4 py-1 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
            + {{ __('ent.add-pret') }}
        </button>
        
    </div>


    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100  dark:bg-gray-900/50 w-full">
            <tr class="w-full " >
                <th scope="col" class="ltr:text-left rtl:text-right px-8 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.date') }}
                </th>
                <th scope="col" class="px-6 py-3 rllt  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.type') }} 
                </th>
                <th scope="col" class="px-6 py-3 text-right  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.montnat') }} 
                </th>
                <th scope="col" class="ltr:text-left rtl:text-right px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.date-debut') }}
                </th>
                <th scope="col" class="px-6 py-3 rllt  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.echs') }} 
                </th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
    @forelse ($dettes as $dette)
        <tr @class(['h-4','w-full','text-center','bg-red-500/20' => $dette->list, 'dark:bg-red-900/30' => $dette->list])  >
            <td class="px-6 py-3  whitespace-nowrap">
                <div class="flex items-center w-full">
                    <div class="ml-2 flex space-x-2 ">
                        <div class="flex flex-col rllt">
                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                                <span class=""> </span>
                                <a wire:navigate.hover href="{{url(app()->getLocale().'/Dette'.'/'.$dette->id) }}" class=" hover:underline" >
                                    {{ $dette->date }} 
                                </a>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        @if (($dette->type))
                            {{ __('ent.pret') }}                            
                        @else
                            {{ __('ent.free') }} 
                        @endif
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div dir="ltr" class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{   number_format($dette->montant, 0, '.', ' ') }}
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{ $dette->start_date }} 
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{ $dette->eche }} 
                </div>
            </td>
            <td class="flex space-x-2 py-2 px-2 h-full items-center">
                <div class="mx-4">
                    <button   wire:click="$dispatch('dett-edit',{ id: {{ $dette->id }} })">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" stroke-teal-700 dark:stroke-teal-300 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>                                                                               
                    </button>
                </div>    
                <div>
                    @can('admin')
                        <button  wire:click="$dispatch('dtls',{ id: {{ $dette->id }} })" class=" stroke-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-red-600 dark:stroke-red-400 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>                                                                               
                        </button>
                    @endcan
                   
                </div>                                
            </td>
            
        </tr>
    @empty

    @endforelse
  
        </tbody>
    </table>   
 </div>

