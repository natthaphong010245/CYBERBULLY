@extends('layouts.faq.index')

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-8">
        @include('layouts.faq.list.1')
        @include('layouts.faq.list.2')
        @include('layouts.faq.list.3')
    </div>
@endsection

@section('scripts')
    @extends('layouts.faq.script')
@endsection
