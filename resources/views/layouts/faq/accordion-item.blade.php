{{-- layouts/faq/accordion-item.blade.php --}}
<div class="accordion-item mb-3">
    <button class="accordion-button w-full py-3 px-6 text-left rounded-xl text-lg font-medium flex justify-between items-center bg-[#929AFF] text-white">
        <span>{{ $item['question'] }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-[#929AFF] rounded-b-xl border-0 border-blue-300 text-white">
        <div class="p-4 break-words text-sm">{!! $item['answer'] !!}</div>
    </div>
</div>