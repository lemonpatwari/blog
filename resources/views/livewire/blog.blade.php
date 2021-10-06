<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <div class="p-2 flex justify-between">

                                    <input type="text" placeholder="Enter name / slug / status"
                                           wire:model.debounce.800ms="search"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">


                                    <a href="{{ route('blogs.create') }}"
                                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                    >
                                        Add New
                                    </a>

                                </div>


                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Serial No
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Author
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tag
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Is Approved
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>


                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                    @forelse ($blogs as $row)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $row->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $row->user->name ?? '' }}
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @foreach($row->categories as $category)

                                                    <ul>
                                                        <li class="py-1">
                                                            <span
                                                                class="py-1 px-2 inline-flex text-xs bg-red-100 text-black leading-5 font-semibold rounded-full bg-green-100 text-green-800 capitalize">
                                                                {{ $category->title }}
                                                            </span>
                                                        </li>
                                                    </ul>

                                                @endforeach
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @foreach($row->tags as $tag)

                                                    <ul>
                                                        <li class="py-1">
                                                            <span
                                                                class="my-1 px-2 inline-flex text-xs bg-red-100 text-black leading-5 font-semibold rounded-full bg-green-100 text-green-800 capitalize">
                                                                {{ $tag->title }}
                                                            </span>
                                                        </li>
                                                    </ul>

                                                @endforeach
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                                @if($row->is_approved == '1')
                                                    <span
                                                        class="my-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-black capitalize">
                                                                Approved
                                                            </span>
                                                @else
                                                    <span
                                                        class="my-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-600 text-green-100 capitalize">
                                                         Not Approved
                                                    </span>
                                                @endif

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">

                                                @if($row->status  == \App\Enums\BlogStatus::getValue('ACTIVE'))
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 capitalize">{{ \App\Enums\CategoryStatus::getValue('ACTIVE') }}</span>
                                                @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-green-50 capitalize">{{ \App\Enums\CategoryStatus::getValue('INACTIVE') }}</span>
                                                @endif
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"
                                                style="min-width: 128px">

                                                <a href="{{ route('blogs.edit',$row->id) }}"
                                                   class="hover:text-green-900">Edit</a> ||

                                                <a href="javaScript:void(0)"
                                                   wire:click="deleteShowModal('{{ $row->id }}')"
                                                   class="hover:text-red-900">Delete</a>


                                                {{--<a href="{{ route('blogs.edit',$row->id) }}"
                                                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                                >
                                                    Edit
                                                </a>--}}

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                No data found
                                            </td>
                                        </tr>
                                    @endforelse

                                    <!-- More items... -->
                                    </tbody>
                                </table>


                                <div class="p-2">
                                    {{ $blogs->links() }}
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">


                {{ __('Delete Blog') }}


            </x-slot>

            <x-slot name="content">


                <div class="mt-4 text-center">
                    <h1 class="text-red-500 text-2xl">Are you sure permanent delete this record?</h1>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteBlog" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>


            </x-slot>
        </x-jet-dialog-modal>


    </div>
</div>


@push('script')
    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? '')
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        })
    </script>
@endpush
