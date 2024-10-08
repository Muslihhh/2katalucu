@foreach($categories as $category)
    <a href="{{ route('categories.show', $category->id) }}" class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50">
        <span class="text-sm font-medium text-gray-900">{{ $category->name }}</span>
    </a>
@endforeach
