{{-- layouts/faq/category.blade.php --}}
<div class="text-center mb-4 mt-2 relative">
    <div class="flex items-center justify-center">
        <div class="flex-grow h-px bg-[#3E36AE] mr-4"></div>
        <div class="relative">
            <h1 class="text-xl font-bold text-[#3E36AE] inline-block">{{ $category['title'] }}</h1>
        </div>
        <div class="flex-grow h-px bg-[#3E36AE] ml-4"></div>
    </div>
</div>

<div class="space-y-4 mb-6 mt-2">
    @foreach($category['items'] as $item)
        @include('layouts.faq.accordion-item', ['item' => $item])
    @endforeach
</div>