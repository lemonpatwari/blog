<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <div class="p-2 flex justify-end">

                                    <a href="{{ route('blogs.index') }}"
                                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                    >
                                        See Lists
                                    </a>

                                </div>


                                <form action="{{ route('blogs.update',$blog) }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex justify-between space-x-4 px-3 py-3">
                                        <div class="relative w-full px-2">
                                            <x-jet-label for="name" value="{{ __('Name') }}"/>
                                            <x-jet-input id="name" class="block mt-1 w-full" placeholder="Enter name"
                                                         type="text"
                                                         name="name"
                                                         value="{{ $blog->name }}"
                                                         required/>
                                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="relative  w-full px-2">
                                            <label for="is_approved" class="block text-sm font-medium text-gray-700">Is
                                                Approved</label>
                                            <select required id="is_approved" name="is_approved"
                                                    autocomplete="is_approved"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                                <option
                                                    value="1" {{ ($blog->is_approved == old('is_approved')) ? 'selected' :'' }}
                                                "
                                                }}>Yes</option>
                                                <option
                                                    value="0" {{ ($blog->is_approved == old('is_approved')) ? 'selected' :'' }}
                                                "
                                                }}>No</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex justify-between space-x-4 px-3 py-3">
                                        <div class="relative  w-full px-2">
                                            <x-jet-label for="banner_url" value="{{ __('Banner') }}"/>
                                            <x-jet-input id="banner_url" class="block mt-1 w-full" type="file"
                                                         name="banner_url" accept="image/*"/>

                                            <img class="py-2" src="{{ $blog->banner_url }}"
                                                 alt="{{ $blog->name }}" width="80px">
                                            @error('image_url') <span
                                                class="text-red-500">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="relative  w-full px-2">
                                            <label for="status"
                                                   class="block text-sm font-medium text-gray-700">Status</label>
                                            <select id="status" required name="status" autocomplete="status"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                                @foreach($blogStatus as $key=>$row)
                                                    <option
                                                        value="{{ $key }}" {{ ($blog->status == $key) ? 'selected' : '' }}>{{ $row }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex justify-between space-x-4 px-3 py-3">
                                        <div class="relative  w-full px-2">
                                            <label for="tags_id"
                                                   class="block text-sm font-medium text-gray-700">Tags</label>
                                            <select id="tags_id" required multiple="multiple" name="tags_id[]"
                                                    autocomplete="status"
                                                    class="tags_id select2 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach($tags as $key=>$row)
                                                    <option
                                                        value="{{ $key }}" {{ in_array($key,$selectedTag) ? 'selected' : '' }}>{{ $row }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="relative  w-full px-2">
                                            <label for="categories_id" class="block text-sm font-medium text-gray-700">Categories</label>
                                            <select id="categories_id" multiple="multiple" name="categories_id[]"
                                                    required
                                                    class="categories_id select2 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                                @foreach($categories as $key=>$row)
                                                    <option
                                                        value="{{ $key }}" {{ in_array($key,$selectedCategory) ? 'selected' : '' }}>{{ $row }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="flex justify-between space-x-4 px-3 py-3">

                                        <div class="relative  w-full px-2">

                                            <label for="text"
                                                   class="block text-sm font-medium text-gray-700">Blog Body</label>

                                            <textarea name="blog_body" id="editor"
                                                      class="form-control editor">{{ $blog->blog_body }}</textarea>


                                        </div>
                                        @error('text') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="flex justify-center space-x-4 px-3 py-3">
                                        <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Submit
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('style')
        <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('ckeditor/samples/css/samples.css') }}">
        <link rel="stylesheet" href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
    @endpush

    @push('script')

        <script src="{{ asset('admin/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('admin/js/select2.min.js') }}"></script>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('ckeditor/samples/js/sample.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('.select2').select2();
                initSample();
            });
        </script>
    @endpush

</x-app-layout>
