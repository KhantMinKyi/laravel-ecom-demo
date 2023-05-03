@extends('admin.layout.master')
@section('content')
    <section>
        <div class=" flex-row-reverse hidden sm:flex">
            <a href="" class="">
                <i class="fa fa-solid fa-user bg-indigo-500 p-2 rounded-full text-white"></i>
            </a>
        </div>
        <hr class="my-2">
        <h3 class="text-indigo-600 font-Raleway m-2">Items List</h3>
        <div class="flex flex-row-reverse">
            <div>
                <a href={{ route('item.create') }} class="bg-indigo-500 p-2 rounded-lg text-white text-sm">+ Add Items</a>
            </div>
        </div>
        <div class=" my-12 justify-center ">
            <table class="table-auto w-full">
                <thead class="bg-indigo-500 text-white text-sm">
                    <tr class="h-10">
                        <th>Action</th>
                        <th>No</th>
                        <th>Items</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Owner</th>
                        <th>Publish</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key => $item)
                        <tr class="border-b">
                            <td class="text-center py-2">
                                <div>
                                    <form action={{ route('item.destroy', $item->id) }} method="POST"
                                        onsubmit="return confirm('Do You Want To Delete ?')">
                                        @csrf
                                        @method('DELETE')
                                        <a href={{ route('item.edit', $item->id) }}>
                                            <i class="fa-solid fa-pen bg-emerald-400 p-2 rounded-md text-white "></i>
                                        </a>
                                        <button type="submit">
                                            <i class="fa-solid fa-trash bg-red-500 p-2 rounded-md text-white "></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{!! substr($item->description, 0, 20) !!}..</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->owner->name }}</td>
                            <td><label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" disabled
                                        @if ($item->status == 'publish') checked @endif>
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                    </div>
                                </label></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $items->links('pagination::tailwind') }}
        </div>
    </section>
@endsection
